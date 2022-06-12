<?php

namespace App\Domains\Event\Enums;

enum Status: int
{
    case UPCOMING = 1;
    case CANCELED = 2;
    case HELD = 3;
    case OVERDUE = 4;
}
