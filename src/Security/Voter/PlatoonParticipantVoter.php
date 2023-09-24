<?php

namespace App\Security\Voter;

use App\Entity\Participant;
use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class PlatoonParticipantVoter extends Voter
{
    public const REGISTER_PARTICIPANT = 'REGISTER_PARTICIPANT';

    protected function supports(string $attribute, mixed $subject): bool
    {
        return $attribute === self::REGISTER_PARTICIPANT && $subject instanceof Participant;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();

        if (!$user instanceof User) {
            return false;
        }

        if (!$subject instanceof Participant) {
            return false;
        }

        return true;
    }
}
