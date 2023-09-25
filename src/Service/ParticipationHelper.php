<?php

namespace App\Service;

use App\Entity\Platoon;
use App\Entity\User;
use App\Repository\ParticipantRepository;
use Doctrine\ORM\EntityManagerInterface;

class ParticipationHelper
{
    /**
     * @return ParticipantRepository
     */
    private $repo;

    /**
     * @return EntityManagerInterface
     */
    private $em;

    public function __construct(ParticipantRepository $repo, EntityManagerInterface $em)
    {
        $this->repo = $repo;
        $this->em = $em;
    }

    /**
     * @var boolean
     * @return boolean Checks whether the participant is already registered in the platoon
     */
    public function isAlreadyRegistered(User $archer, Platoon $platoon)
    {
        return $this->repo->isAlreadyRegistered($archer, $platoon);
    }

    public function cancelParticipation(User $archer, Platoon $platoon)
    {
        if ($this->isAlreadyRegistered($archer, $platoon)) {
            $participant = $this->repo->getParticipant($archer, $platoon);
            $this->em->remove($participant);
            $this->em->flush();
        }
    }
}
