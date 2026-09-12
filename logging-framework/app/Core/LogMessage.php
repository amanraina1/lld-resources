<?php

namespace App\Core;

use DateTimeImmutable;

class LogMessage
{
    private string $message;
    private ?DateTimeImmutable $timestamp;
    private LogLevel $level;
    private string $source;

    public function __construct(string $message, DateTimeImmutable $timestamp, LogLevel $level, string $source)
    {
        $this->timestamp = $timestamp;
        $this->message = $message;
        $this->level = $level;
        $this->source = $source;
    }

    public function getTimestamp() : DateTimeImmutable
    {
        return $this->timestamp;
    }

    public function getLevel() : LogLevel
    {
        return $this->level;
    }

    public function getSource() : string
    {
        return $this->source;
    }

    public function getMessage() : string
    {
        return $this->message;
    }

    public function toString()
    {
        return "LogMessage{timestamp=$this->timestamp, level=$this->level, message=$this->message, source=$this->source}";
    }

    public static function builder()
    {
        return new LogMessageBuilder();
    }

    public static function createFromBuilder(string $message, DateTimeImmutable $timestamp, LogLevel $level, string $source)
    {
        return new self($message, $timestamp, $level, $source);
    }
}

class LogMessageBuilder
{
    private string $message;
    private ?DateTimeImmutable $timestamp = null;
    private LogLevel $level;
    private string $source;

    public function __construct()
    {
        $this->timestamp = now();
    }
    public function message(string $message) : \App\Core\LogMessageBuilder
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
        return LogMessage::createFromBuilder($this->message, $this->timestamp, $this->level, $this->source);
    }
}