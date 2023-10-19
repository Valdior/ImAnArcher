<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Enum\TournamentTypeEnum;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\TournamentRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: TournamentRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[Vich\Uploadable]
class Tournament
{
    /**
     * Hook timestampable behavior
     * updates createdAt, updatedAt fields
     */
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $startDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $endDate = null;

    #[ORM\Column(type: Types::INTEGER, enumType: TournamentTypeEnum::class)]
    private ?TournamentTypeEnum $type = null;

    #[ORM\ManyToOne(inversedBy: 'tournaments')]
    private ?Club $organizer = null;

    #[ORM\OneToMany(mappedBy: 'tournament', targetEntity: Platoon::class, orphanRemoval: true, cascade: ['persist'])]
    private Collection $platoons;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\ManyToOne]
    private ?Location $location = null;

    #[Vich\UploadableField(mapping: 'attachments', fileNameProperty: 'fileName', size: 'fileSize')]
    private ?File $invitation = null;

    #[ORM\Column(nullable: true)]
    private ?string $fileName = null;

    #[ORM\Column(nullable: true)]
    private ?int $fileSize = null;

    public function __construct()
    {
        $this->platoons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getOrganizer(): ?Club
    {
        return $this->organizer;
    }

    public function setOrganizer(?Club $organizer): self
    {
        $this->organizer = $organizer;

        return $this;
    }

    /**
     * @return Collection<int, Platoon>
     */
    public function getPlatoons(): Collection
    {
        return $this->platoons;
    }

    public function addPlatoon(Platoon $platoon): self
    {
        if (!$this->platoons->contains($platoon)) {
            $this->platoons->add($platoon);
            $platoon->setTournament($this);
        }

        return $this;
    }

    public function removePlatoon(Platoon $platoon): self
    {
        if ($this->platoons->removeElement($platoon)) {
            // set the owning side to null (unless already changed)
            if ($platoon->getTournament() === $this) {
                $platoon->setTournament(null);
            }
        }

        return $this;
    }

    public function getType(): ?TournamentTypeEnum
    {
        return $this->type;
    }

    public function setType(TournamentTypeEnum $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    #[ORM\PrePersist]
    public function setNameIfNull(): void
    {
        if (strlen(trim($this->name)) == 0) {
            $this->name = $this->getOrganizer()->getAcronym() . ' - ' . $this->getOrganizer()->getName();
        }
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): static
    {
        $this->location = $location;
        return $this;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(?string $fileName): static
    {
        $this->fileName = $fileName;

        return $this;
    }

    public function getFileSize(): ?int
    {
        return $this->fileSize;
    }

    public function setFileSize(?int $fileSize): static
    {
        $this->fileSize = $fileSize;

        return $this;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setInvitation(?File $invitation = null): void
    {
        $this->invitation = $invitation;

        if (null !== $invitation) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getInvitation(): ?File
    {
        return $this->invitation;
    }
}
