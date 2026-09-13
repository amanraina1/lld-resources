<?php

namespace App\Appenders;

use App\Core\Interfaces\LogAppender;
use App\Core\LogLevel;
use App\Core\LogMessage;

class DatabaseAppender implements LogAppender
{
    public function __construct()
    {
        $this->setConnection();
        $this->prepareStatement();
    }

    private function setConnection()
    {

    }

    private function prepareStatement()
    {

    }

    public function append(LogMessage $message) : void
    {

    }

    public function setLevel(LogLevel $level) : void
    {

    }

    public function getLevel() : LogLevel
    {

    }

    public function isEnabled(LogLevel $level) : bool
    {

    }
}