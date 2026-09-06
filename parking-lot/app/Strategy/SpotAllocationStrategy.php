<?php

namespace App\Strategy;

use App\Core\ParkingSpot;
use App\Enums\VehicleType;

interface SpotAllocationStrategy
{
    public function findSpot(array $parkingFloors, VehicleType $type) : ?ParkingSpot;
}