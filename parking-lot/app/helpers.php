<?php

use App\Enums\VehicleType;
use App\Core\ParkingSpot;

function dd($element)
{
    echo "<pre>";
    var_dump($element);
    echo "</pre>";
}

function now(): DateTimeImmutable
{
    return new DateTimeImmutable();
}

function diff(DateTimeImmutable $entryTime, DateTimeImmutable $exitTime)
{
    $interval = $entryTime->diff($exitTime);
    $totalHoursExact = ($interval->days * 24) + $interval->h + ($interval->i / 60);
    return $totalHoursExact;
}

function makeFloorSpots(int $floorId, int $count, VehicleType $type)
{
    $spots = [];
    for($i=0; $i < $count; $i++) {
        $spots[] = new ParkingSpot("F{$floorId}-S{$i}", $type);
    }
    return $spots;
}