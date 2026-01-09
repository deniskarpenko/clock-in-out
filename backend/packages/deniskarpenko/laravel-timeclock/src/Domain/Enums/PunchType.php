<?php

declare(strict_types=1);

namespace Deniskarpenko\Timeclock\Domain\Enums;

enum PunchType: string
{
    case CLOCK_IN = 'clock_in';
    case CLOCK_OUT = 'clock_out';
    case START_LUNCH = 'start_lunch';
    case END_LUNCH = 'end_lunch';
    case START_BREAK = 'start_break';
    case END_BREAK = 'end_break';
    case START_PAID_BREAK = 'start_paid_break';
    case END_PAID_BREAK = 'end_paid_break';
}
