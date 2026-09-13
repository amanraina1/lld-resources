<?php

namespace Filters;

use App\Core\Interfaces\LogFilter;
use App\Core\LogLevel;
use App\Core\LogMessage;

class LevelFilter implements LogFilter
{
    private LogLevel $level;

    public function __construct(LogLevel $level)
    {
        $this->level = $level;
    }

    public function shoudlLog(LogMessage $message) : boolean
    {
        return $message->getLevel()->isGreaterOrEqual($this->level);
    }

    public function setLevel(LogLevel $level) : void
    {
        $this->level = $level;
    }

    public function getLevel() : LogLevel
    {
        return $this->level;
    }
}