<?php

namespace App\Core\Interfaces;

use App\Core\LogLevel;
use App\Core\LogMessage;

interface LogFilter
{
    public function shoudlLog(LogMessage $message) : boolean

    public function setLevel(LogLevel $level) : void;

    public function getLevel() : LogLevel;
}