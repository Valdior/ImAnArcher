<?php

namespace App\Entity;

use App\Repository\ParticipantRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: ParticipantRepository::class)]
#[UniqueEntity(
    fields: ['archer', 'platoon'],
    errorPath: 'archer',
    message: 'You are already registered in this platoon.',
)]
class Participant
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

    #[ORM\Column]
    private ?int $points = null;

    #[ORM\Column(nullable: true)]
    private ?int $numberOfX = null;

    #[ORM\Column]
    private ?int $numberOfTen = null;

    #[ORM\Column(nullable: true)]
    private ?int $numberOfNine = null;

    #[ORM\Column]
    private ?bool $isForfeited = null;

    #[ORM\ManyToOne(inversedBy: 'competitions')]
    #[ORM\JoinColumn(nullable: true, onDelete: "SET NULL")]
    private ?User $archer = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?ArcherCategory $category;

    #[ORM\ManyToOne(inversedBy: 'participants')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Platoon $platoon = null;

    public function __construct()
    {
        $this->points = 0;
        $this->numberOfTen = 0;
        $this->isForfeited = false;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(int $points): self
    {
        $this->points = $points;

        return $this;
    }

    public function getNumberOfX(): ?int
    {
        return $this->numberOfX;
    }

    public function setNumberOfX(?int $numberOfX): self
    {
        $this->numberOfX = $numberOfX;

        return $this;
    }

    public function getNumberOfTen(): ?int
    {
        return $this->numberOfTen;
    }

    public function setNumberOfTen(int $numberOfTen): self
    {
        $this->numberOfTen = $numberOfTen;

        return $this;
    }

    public function getNumberOfNine(): ?int
    {
        return $this->numberOfNine;
    }

    public function setNumberOfNine(?int $numberOfNine): self
    {
        $this->numberOfNine = $numberOfNine;

        return $this;
    }

    public function isIsForfeited(): ?bool
    {
        return $this->isForfeited;
    }

    public function setIsForfeited(bool $isForfeited): self
    {
        $this->isForfeited = $isForfeited;

        return $this;
    }

    public function getArcher(): ?User
    {
        return $this->archer;
    }

    public function setArcher(?User $archer): self
    {
        $this->archer = $archer;

        return $this;
    }

    public function getCategory(): ?ArcherCategory
    {
        return $this->category;
    }

    public function setCategory(?ArcherCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getPlatoon(): ?Platoon
    {
        return $this->platoon;
    }

    public function setPlatoon(?Platoon $platoon): self
    {
        $this->platoon = $platoon;

        return $this;
    }
}
