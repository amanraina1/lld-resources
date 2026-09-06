<?php

namespace App\Core;

use App\Enums\VehicleType;
use App\Strategy\SpotAllocationStrategy;

class FirstFitStrategy implements SpotAllocationStrategy
{
    public function findSpot(array $parkingFloors, VehicleType $type) : ?ParkingSpot
    {
        foreach($parkingFloors as $parkingFloor)
        {
            foreach($parkingFloor->getParkingSpots() as $spot)
            {
                if($spot->isAvailable()) return $spot;
            }
        }

        return null;
    }
}