<?php

function dd($element)
{
    echo "<pre>";
    var_dump($element);
    echo "</pre>";
}

function now(): DateTimeImmutable
{
    return new DateTimeImmutable();
}