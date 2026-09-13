<?php

namespace App\Formatter;

use App\Core\Interfaces\LogFormatter;
use App\Core\LogMessage;

class DetailedFormatter implements LogFormatter
{
    private string $pattern;

    private string $dateFormat;

    public function __construct(?string $pattern = null)
    {
        $this->pattern = $pattern ?? "[%LEVEL] %TIMESTAMP [%SOURCE] - %MESSAGE";
        $this->dateFormat = "Y-m-d H:i:s";
    }

    public function format(LogMessage $message) : string
    {
        if(!$this->pattern) {
            return "[{$message->getLevel()}] {$message->getTimestamp()} [{$message->getSource()}] {$message->getMessage()}";
        }
        $formattedString = str_replace(
            ['%LEVEL', '%TIMESTAMP', '%SOURCE', '%MESSAGE'],
            [
                $message->getLevel()->name,
                $message->getTimestamp()->format('Y-m-d H:i:s'),
                $message->getSource(),
                $message->getMessage()
            ],
            $this->pattern
        );

        return $formattedString;
    }

    public function setPattern(string $pattern) : void
    {
        $this->pattern = $pattern;
    }

    public function getPattern() : string
    {
        return $this->pattern;
    }

    public function setDateFormat(string $dateFormat) : void
    {
        $this->dateFormat = $dateFormat;
    }
}