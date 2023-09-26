<?php

namespace App\Security\Voter;

use App\Entity\User;
use App\Entity\Platoon;
use App\Entity\Participant;
use App\Service\ParticipationService;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class PlatoonParticipantVoter extends Voter
{
    final public const REGISTER = 'REGISTER_PARTICIPANT';
    final public const UNREGISTER = 'UNREGISTER_PARTICIPANT';

    public function __construct(
        private Security $security,
        private ParticipationService $ps
    ) {
    }

    protected function supports(string $attribute, mixed $subject): bool
    {
        return in_array($attribute, [self::REGISTER, self::UNREGISTER]) && $subject instanceof Platoon;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();

        if (!$user instanceof User) {
            return false;
        }

        if (!$subject instanceof Platoon) {
            return false;
        }

        /** @var Platoon $platoon */
        $platoon = $subject;

        return match ($attribute) {
            self::REGISTER => $this->canRegister($platoon, $user),
            self::UNREGISTER => $this->canUnregister($platoon, $user),
            default => false
        };

        return true;
    }

    private function canRegister(Platoon $platoon, User $user): bool
    {
        if ($this->security->isGranted('ROLE_ADMIN')) {
            return true;
        }

        // Est-ce que l'utilisateur est déjà enregistré ?
        if ($this->ps->isAlreadyRegistered($user, $platoon)) {
            return false;
        }

        // Est-ce qu'il y a encore une place de disponible ?
        return true;
    }

    private function canUnregister(Platoon $platoon, User $user): bool
    {
        if ($this->security->isGranted('ROLE_ADMIN')) {
            return true;
        }

        if ($this->ps->isAlreadyRegistered($user, $platoon)) {
            return true;
        }

        // Est-ce que tu es bien l'utilisateur en question ?
        return false;
    }
}
