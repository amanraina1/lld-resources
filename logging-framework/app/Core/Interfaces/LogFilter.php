<?php

namespace App\Core\Interfaces;

use Core\LogLevel;

interface LogFilter
{
    public function shoudlLog(string $message) : boolean

    public function setLevel(LogLevel $level) : void;

    public function getLevel() : LogLevel;
}