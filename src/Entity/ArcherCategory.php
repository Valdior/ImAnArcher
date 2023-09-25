<?php

namespace App\Entity;

use App\Repository\ArcherCategoryRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: ArcherCategoryRepository::class)]
class ArcherCategory
{
    /**
     * Hook timestampable behavior
     * updates createdAt, updatedAt fields
     */
    use TimestampableEntity;

    public const ARC_RECURVE = 'recurve';
    public const ARC_COMPOUND = 'compound';
    public const ARC_LONGBOW = 'longbow';
    public const ARC_BAREBOW = 'barebow';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 10)]
    private ?string $acronym = null;

    #[ORM\Column(nullable: true)]
    private ?int $minimumAge = null;

    #[ORM\Column(length: 50)]
    private ?string $arc = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAcronym(): ?string
    {
        return $this->acronym;
    }

    public function setAcronym(string $acronym): self
    {
        $this->acronym = $acronym;

        return $this;
    }

    public function getMinimumAge(): ?int
    {
        return $this->minimumAge;
    }

    public function setMinimumAge(?int $minimumAge): self
    {
        $this->minimumAge = $minimumAge;

        return $this;
    }

    public function getArc(): ?string
    {
        return $this->arc;
    }

    public function setArc(string $arc): self
    {
        if (
            !in_array($arc, array(
            self::ARC_RECURVE,
            self::ARC_COMPOUND,
            self::ARC_LONGBOW,
            self::ARC_BAREBOW))
        ) {
            throw new \InvalidArgumentException("Invalid type arc");
        }

        $this->arc = $arc;

        return $this;
    }

    public function __toString()
    {
        return $this->getAcronym();
    }
}
