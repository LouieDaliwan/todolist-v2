<?php

namespace Domain\Teams\Actions;

use App\Actions\SendTeamGuestInvitation;
use App\Actions\SendTeamInvitation;
use Domain\Teams\Models\Team;
use Support\SegregateRegisteredAndNonUser;

class InviteTeamUsersAction
{
    public function __construct(
        public SegregateRegisteredAndNonUser $segregateUser,

        public SendTeamInvitation $sendTeamInvitation,

        public SendTeamGuestInvitation $sendTeamGuestInvitation
    ){}

    public function __invoke(array $attributes, Team $team)
    {
        $segregateUser = ($this->segregateUser)($team, $attributes);

        if (! empty($segregateUser['registered_user'])) {

            $this->sendTeamInvitation->onQueue("team-invitation-{$team->id}")
            ->execute($segregateUser['registered_user'], $team);

        }

        if (! empty($segregateUser['non_register_user'])) {

            $this->sendTeamGuestInvitation->onQueue("team-guest-invitation-{$team->id}")
            ->execute($segregateUser['non_register_user'], $team);

        }
    }
 }
