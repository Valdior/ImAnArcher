<?php

namespace App\Entity;

use App\Repository\AffiliateRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: AffiliateRepository::class)]
class Affiliate
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

    #[ORM\Column(length: 20)]
    private ?string $licence = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $affiliateSince = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $affiliateEnd = null;

    #[ORM\ManyToOne(inversedBy: 'members')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Club $club = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $archer = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLicence(): ?string
    {
        return $this->licence;
    }

    public function setLicence(string $licence): self
    {
        $this->licence = $licence;

        return $this;
    }

    public function getAffiliateSince(): ?\DateTimeInterface
    {
        return $this->affiliateSince;
    }

    public function setAffiliateSince(\DateTimeInterface $affiliateSince): self
    {
        $this->affiliateSince = $affiliateSince;

        return $this;
    }

    public function getAffiliateEnd(): ?\DateTimeInterface
    {
        return $this->affiliateEnd;
    }

    public function setAffiliateEnd(?\DateTimeInterface $affiliateEnd): self
    {
        $this->affiliateEnd = $affiliateEnd;

        return $this;
    }

    public function getClub(): ?Club
    {
        return $this->club;
    }

    public function setClub(?Club $club): self
    {
        $this->club = $club;

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
}
