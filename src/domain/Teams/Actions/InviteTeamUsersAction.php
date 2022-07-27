<?php

namespace Domain\Teams\Actions;

use App\Actions\SendTeamInvitation;
use Domain\Teams\Models\Team;
use Support\Teams\SegregateRegisteredAndNonUser;

class InviteTeamUsersAction
{
    public function __construct(
        public SegregateRegisteredAndNonUser $segregateUser,

        public SendTeamInvitation $sendTeamInvitationAction,

        // public SendTeamProjectAction $sendTeamProjectAction
    ){}

    public function __invoke(array $attributes, Team $team)
    {
        $segregateUser = ($this->segregateUser)($team, $attributes);

        if (! empty($segregateUser['registered_user'])) {

            $this->sendTeamInvitationAction->onQueue()
            ->execute($segregateUser['registered_user'], $team);

        }
    }
 }
