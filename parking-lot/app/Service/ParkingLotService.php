<?php

namespace App\Service;

use App\Core\Ticket;
use App\Core\Vehicle;
use App\Strategy\PricingStrategy;
use App\Strategy\SpotAllocationStrategy;
use App\Enums\VehicleType;
use App\Core\ParkingSpot;
use App\Core\ParkingFloor;

class ParkingLotService
{
    private array $activeTickets;
    private array $parkingFloors;
    private PricingStrategy $pricingStrategy;
    private SpotAllocationStrategy $allocationStrategy;

    public function __construct(array $parkingFloors, PricingStrategy $pricingStrategy, SpotAllocationStrategy $allocationStrategy) {
        $this->parkingFloors = $parkingFloors;
        $this->activeTickets = [];
        $this->pricingStrategy = $pricingStrategy;
        $this->allocationStrategy = $allocationStrategy;
    }

    public function parkVehicle(Vehicle $vehicle) : Ticket
    {
        $spot = $this->allocationStrategy->findSpot($this->parkingFloors, $vehicle->getVehicleType());

        if(!$spot)
        {
            throw new \Exception("Error. No spot left !!");
        }

        if(! $spot->assignVehicle($vehicle))
        {
            throw new \Exception("Error. Spot already taken !!");
        }

        $ticket = new Ticket($spot, $vehicle);

        $this->activeTickets[$ticket->getTicketId()] = $ticket;

        return $ticket;
    }

    public function unparkVehicle(Ticket $ticket)
    {
        if(! array_key_exists($ticket->getTicketId(), $this->activeTickets))
        {
            throw new \Exception("No ticket found with this id !!");
        }

        $ticket->setExitTime(now());
        $ticket->closeTicket($this->pricingStrategy->calculateCharges($ticket));
        $ticket->getSpot()->unassignVehicle();
        unset($this->activeTickets[$ticket->getTicketId()]);
        return $ticket->getCharges();
    }
}