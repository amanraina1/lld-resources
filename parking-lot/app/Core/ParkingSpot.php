<?php

namespace App\Core;

use App\Enums\VehicleType;
use App\Core\Vehicle;

class ParkingSpot
{
    private string $id;
    private VehicleType $vehicleType;
    private ?Vehicle $vehicle = null;

    public function __construct(string $id, VehicleType $vehicleType)
    {
        $this->id = $id;
        $this->vehicleType = $vehicleType;
    }

    public function isAvailable()
    {
        return $this->vehicle === null;
    }

    public function assignVehicle(Vehicle $vehicle)
    {
        if($this->vehicle === null && $vehicle->getVehicleType() === $this->vehicleType)
        {
            $this->vehicle = $vehicle;
            return true;
        }

        return false;
    }

    public function unassignVehicle()
    {
        $this->vehicle = null;
    }

    public function getId()
    {
        return $this->id;
    }
}