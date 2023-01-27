<?php

namespace App\Entity;

use App\Enum\PelotonTypeEnum;
use App\Repository\PelotonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PelotonRepository::class)]
class Peloton
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $maxParticipants = null;

    #[ORM\Column]
    private ?int $type = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $startime = null;

    #[ORM\ManyToOne(inversedBy: 'pelotons')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Tournament $tournament = null;

    public static function getTypeList()
    {
        return array(PelotonTypeEnum::TYPE_18->value, PelotonTypeEnum::TYPE_25->value, PelotonTypeEnum::TYPE_50_30->value, PelotonTypeEnum::TYPE_50->value, PelotonTypeEnum::TYPE_70->value, PelotonTypeEnum::TYPE_1440->value);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaxParticipants(): ?int
    {
        return $this->maxParticipants;
    }

    public function setMaxParticipants(int $maxParticipants): self
    {
        $this->maxParticipants = $maxParticipants;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        if (!in_array($type, self::getTypeList())) {
            throw new \InvalidArgumentException("Invalid type");
        }

        $this->type = $type;

        return $this;
    }

    public function getStartime(): ?\DateTimeInterface
    {
        return $this->startime;
    }

    public function setStartime(\DateTimeInterface $startime): self
    {
        $this->startime = $startime;

        return $this;
    }

    public function getTournament(): ?Tournament
    {
        return $this->tournament;
    }

    public function setTournament(?Tournament $tournament): self
    {
        $this->tournament = $tournament;

        return $this;
    }
}
