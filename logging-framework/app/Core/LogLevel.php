<?php

namespace App\Core;

enum LogLevel : int
{
    case DEBUG = 1;
    case INFO = 2;
    case WARNING = 3;
    case ERROR = 4;
    case FATAL = 5;

    public function isGreaterOrEqual(LogLevel $other)
    {
        return $this->value >= $other->value;
    }

}