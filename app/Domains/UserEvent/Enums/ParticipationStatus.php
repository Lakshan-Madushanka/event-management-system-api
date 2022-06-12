<?php

namespace App\Domains\UserEvent\Enums;

enum ParticipationStatus: int
{
    case UNKNOWN = 1;
    case CONFIRMED = 2;
    case REJECTED = 3;

}