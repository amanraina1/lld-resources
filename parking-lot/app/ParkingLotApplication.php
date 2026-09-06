<?php

namespace App;

use App\Service\ParkingLotService;
use App\Core\Ticket;
use App\Core\Vehicle;

class ParkingLotApplication
{
    private ParkingLotService $service;

    public function __construct(ParkingLotService $service)
    {
        $this->service = $service;
    }

    public function parkVehicle(Vehicle $vehicle) : Ticket
    {
        $ticket = $this->service->parkVehicle($vehicle);
        return $ticket;
    }

    public function unparkVehicle(Ticket $ticket) : int
    {
        return $this->service->unparkVehicle($ticket);
    }
}