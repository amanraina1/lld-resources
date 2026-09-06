<?php

namespace App\Core;

use App\Enums\VehicleType;

class Vehicle
{
    public string $vehicleNumber;

    public VehicleType $vehicleType;

    public function __construct(string $vehicleNumber, VehicleType $vehicleType)
    {
        $this->vehicleNumber = $vehicleNumber;

        $this->vehicleType = $vehicleType;
    }

    public function getNumber()
    {
        return $this->vehicleNumber;
    }

    public function getVehicleType()
    {
        return $this->vehicleType;
    }
}