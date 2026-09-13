<?php

namespace App\Appenders;

use App\Core\Interfaces\LogAppender;
use App\Core\Loglevel;
use App\Core\LogMessage;
use App\Formatter\SimpleFormatter;
use App\Formatter\DetailedFormatter;
use App\Core\Interfaces\LogFormatter;

class ConsoleAppender implements LogAppender
{
    private LogLevel $level;
    private LogFormatter $formatter;

    public function __construct()
    {
//        $this->formatter = new SimpleFormatter();
        $this->formatter = new DetailedFormatter();
    }

    public function append(LogMessage $message) : void
    {
        if(! $this->isEnabled($message->getLevel())) return;
        $formattedString = $this->formatter->format($message);
        dd($formattedString);
    }

    public function setLevel(LogLevel $level) : void
    {
        $this->level = $level;
    }

    public function getLevel() : LogLevel
    {
        return $this->level;
    }

    public function isEnabled(LogLevel $level) : bool
    {
        return true;
    }
}