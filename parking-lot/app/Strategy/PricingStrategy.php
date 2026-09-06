<?php

namespace App\Strategy;

use App\Core\Ticket;
interface PricingStrategy
{
    public function calculateCharges(Ticket $ticket);
}