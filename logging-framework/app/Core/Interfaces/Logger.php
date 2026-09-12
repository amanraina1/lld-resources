<?php

namespace App\Core\Interfaces;

use App\Core\LogLevel;

interface Logger
{
    public function debug(string $message);
    public function info(string $message);
    public function warning(string $message);
    public function error(string $message);
    public function fatal(string $message);

    public function log(LogLevel $level, string $message);

    public function setLevel(LogLevel $level);
    public function addAppender(LogAppender $appender);
    public function addFilter(LogFilter $filter);
    public function removeFilter(LogFilter $filter);

    public function getAppenders();
    public function getFilters();
}