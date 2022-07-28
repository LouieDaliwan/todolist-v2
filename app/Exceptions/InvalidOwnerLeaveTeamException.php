<?php

namespace App\Exceptions;

use Exception;

class InvalidOwnerLeaveTeamException extends Exception
{
    protected $message = 'It must the owner of the user of this team';
}
