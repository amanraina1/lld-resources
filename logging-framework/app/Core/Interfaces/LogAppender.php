<?php

namespace App\Core\Interfaces;

use App\Core\LogLevel;
use App\Core\LogMessage;

interface LogAppender
{
    public function append(LogMessage $message) : void;

    public function setLevel(LogLevel $level) : void;

    public function getLevel() : LogLevel;

    public function isEnabled(LogLevel $level) : bool;
}