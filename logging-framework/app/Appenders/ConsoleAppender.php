<?php

namespace App\Appenders;

use App\Core\Interfaces\LogAppender;
use App\Core\Loglevel;
use App\Core\LogMessage;

class ConsoleAppender implements LogAppender
{
    public function append(LogMessage $message) : void
    {
        dd($message);
    }

    public function setLevel(LogLevel $level) : void {}

    public function getLevel() : LogLevel {}

    public function isEnabled(LogLevel $level) : bool
    {
        return true;
    }
}