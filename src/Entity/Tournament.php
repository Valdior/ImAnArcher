<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\DBAL\Types\Types;
use App\Enum\TournamentTypeEnum;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\TournamentRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: TournamentRepository::class)]
#[ORM\HasLifecycleCallbacks]
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

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $startDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $endDate = null;

    #[ORM\Column(type: Types::INTEGER, enumType: TournamentTypeEnum::class)]
    private ?TournamentTypeEnum $type = null;

    #[ORM\ManyToOne(inversedBy: 'tournaments')]
    private ?Club $organizer = null;

    #[ORM\OneToMany(mappedBy: 'tournament', targetEntity: Platoon::class, orphanRemoval: true)]
    private Collection $platoons;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

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
}
