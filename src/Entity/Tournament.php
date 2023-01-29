<?php

namespace App\Entity;

use App\Enum\TournamentTypeEnum;
use App\Repository\TournamentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TournamentRepository::class)]
class Tournament
{
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

    #[ORM\OneToMany(mappedBy: 'tournament', targetEntity: Peloton::class, orphanRemoval: true)]
    private Collection $pelotons;

    public function __construct()
    {
        $this->pelotons = new ArrayCollection();
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
     * @return Collection<int, Peloton>
     */
    public function getPelotons(): Collection
    {
        return $this->pelotons;
    }

    public function addPeloton(Peloton $peloton): self
    {
        if (!$this->pelotons->contains($peloton)) {
            $this->pelotons->add($peloton);
            $peloton->setTournament($this);
        }

        return $this;
    }

    public function removePeloton(Peloton $peloton): self
    {
        if ($this->pelotons->removeElement($peloton)) {
            // set the owning side to null (unless already changed)
            if ($peloton->getTournament() === $this) {
                $peloton->setTournament(null);
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
}
