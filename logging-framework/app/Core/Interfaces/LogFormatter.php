<?php

namespace App\Core\Interfaces;

use App\Core\LogMessage;

interface LogFormatter
{
    public function format(LogMessage $message) : string;

    public function setPattern(string $pattern) : void;

    public function getPattern() : string;

    public function setDateFormat(string $dateFormat) : void;
}