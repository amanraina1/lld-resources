<?php

namespace App\Core;

use App\Core\Interfaces\Logger;
use App\Core\LogMessage;
use App\Core\LogLevel;
use App\Core\Interfaces\LogAppender;
use App\Core\Interfaces\LogFilter;
use App\Appenders\ConsoleAppender;

class LoggerImplementation implements Logger
{
    private string $name;
    private LogLevel $level;
    private array $appenders;
    private array $filters;

    public function __construct(string $name, bool $addDefaultAppender = true)
    {
        $this->name = $name;
        $this->level = LogLevel::DEBUG;
        $this->appenders = [];
        $this->filters = [];

        if($addDefaultAppender)
        {
            $this->addAppender(new ConsoleAppender());
        }
    }

    public function debug(string $message) : void
    {
        $this->log(LogLevel::DEBUG, $message);
    }

    public function info(string $message) : void
    {
        $this->log(LogLevel::INFO, $message);
    }

    public function warning(string $message) : void
    {
        $this->log(LogLevel::WARNING, $message);
    }

    public function error(string $message) : void
    {
        $this->log(LogLevel::ERROR, $message);
    }
    public function fatal(string $message) : void
    {
        $this->log(LogLevel::FATAL, $message);
    }

    public function log(LogLevel $level, string $message) : void
    {
        if(! $level->isGreaterOrEqual($this->level)) return;

        $className = (new \ReflectionClass($this))->getShortName();

        $message = LogMessage::builder()
            ->level($level)
            ->message($message)
            ->source($className)
            ->build();

        foreach($this->filters as $filter) {
            if(! $filter->shouldLog($message)) return;
        }

        foreach($this->appenders as $appender) {
            if($appender->isEnabled($level)) {
                $appender->append($message);
            }
        }
    }

    public function setLevel(LogLevel $level) : void
    {
        $this->level = $level;
    }
    public function addAppender(LogAppender $appender) : void
    {
        $this->appenders[] = $appender;
    }
    public function addFilter(LogFilter $filter) : void
    {
        $this->filters[] = $filter;
    }
    public function removeFilter(LogFilter $filter) : void
    {
        $this->filters = array_values(
            array_filter($this->filters, fn($f) => $f !== $filter)
        );
    }
    public function getAppenders() : array
    {
        return $this->appenders;
    }
    public function getFilters() : array
    {
        return $this->filters;
    }
}