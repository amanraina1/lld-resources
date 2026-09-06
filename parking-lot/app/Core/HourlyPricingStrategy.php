<?php

namespace App\Core;

use App\Strategy\PricingStrategy;
use App\Core\Ticket;
use DateInterval;

class HourlyPricingStrategy implements PricingStrategy
{
    private int $ratePerHour;

    public function __construct(int $ratePerHour)
    {
        $this->ratePerHour = $ratePerHour;
    }

    public function calculateCharges(Ticket $ticket)
    {
        // uncomment this line and comment the diff calculation for demo, it will add 2.5 hours in the exit time
        // $this->addDummyValueInExitTime($ticket);

        $diff = diff($ticket->entryTime, $ticket->exitTime);
        $totalCost = max(ceil($diff), 1) * $this->ratePerHour;
        return (int) $totalCost;
    }

//    private addDummyValueInExitTime(Ticket $ticket)
//    {
//        $exitTime = $ticket->entryTime->add(new DateInterval('PT2H17M'));
//        $diff = diff($ticket->entryTime, $exitTime);
//    }
}