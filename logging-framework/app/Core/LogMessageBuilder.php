<?php

namespace App\Core;

use DateTimeImmutable;
use App\Core\LogMessage;
use App\Core\LogLevel;

class LogMessageBuilder
{
    private string $message;
    private DateTimeImmutable $timestamp;
    private LogLevel $level;
    private string $source;

    public function __construct()
    {
        $this->timestamp = now();
    }
    public function message(string $message) : LogMessageBuilder
    {
        $this->message = $message;
        return $this;
    }

    public function level(LogLevel $level) : LogMessageBuilder
    {
        $this->level = $level;
        return $this;
    }

    public function timestamp(DateTimeImmutable $timestamp) : LogMessageBuilder
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    public function source(string $source) : LogMessageBuilder
    {
        $this->source = $source;
        return $this;
    }

    public function build()
    {
        return new LogMessage($this);
    }
}