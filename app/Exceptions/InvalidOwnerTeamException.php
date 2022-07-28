<?php

namespace App\Exceptions;

use Exception;

class InvalidOwnerTeamException extends Exception
{
    protected $message = 'Invalid Owner';
}
