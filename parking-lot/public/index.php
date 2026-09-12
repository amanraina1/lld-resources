<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/helpers.php';

use App\ParkingLotApplication;
use App\Service\ParkingLotService;
use App\Core\ParkingFloor;
use App\Core\HourlyPricingStrategy;
use App\Enums\VehicleType;
use App\Core\Vehicle;
use App\Core\FirstFitStrategy;

$floor1 = new ParkingFloor(0, makeFloorSpots(0, 4, VehicleType::Car));
$floor2 = new ParkingFloor(1, makeFloorSpots(1, 4, VehicleType::Car));
$floor3 = new ParkingFloor(2, makeFloorSpots(2, 4, VehicleType::Car));
$floor4 = new ParkingFloor(3, makeFloorSpots(3, 4, VehicleType::Car));
$parkingFloors = [$floor1, $floor2, $floor3, $floor4];

$hourlyPricing = new HourlyPricingStrategy(20);
$allocationStrategy = new FirstFitStrategy();

$service = new ParkingLotService($parkingFloors, $hourlyPricing, $allocationStrategy);

$parking = new ParkingLotApplication($service);

//Demo Run
$vehicle1 = new Vehicle('6976', VehicleType::Car);
$ticket1 = $parking->parkVehicle($vehicle1);
$charge1 = $parking->unparkVehicle($ticket1);
dd($charge1);

//$vehicle2 = new Vehicle('6977', VehicleType::Car);
//$ticket2 = $parking->parkVehicle($vehicle2);
//$charge2 = $parking->unparkVehicle($ticket2);

//$vehicle3 = new Vehicle('6978', VehicleType::Car);
//$ticket3 = $parking->parkVehicle($vehicle3);
//$charge3 = $parking->unparkVehicle($ticket3);

//$vehicle4 = new Vehicle('6979', VehicleType::Car);
//$ticket4 = $parking->parkVehicle($vehicle4);
//$charge4 = $parking->unparkVehicle($ticket4);

//$vehicle5 = new Vehicle('6980', VehicleType::Car);
//$ticket5 = $parking->parkVehicle($vehicle5);
//$charge5 = $parking->unparkVehicle($ticket5);
