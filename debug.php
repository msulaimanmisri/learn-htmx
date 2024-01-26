<?php

class Debug
{
    /**
     * Prints human-readable information about a variable
     */
    public static function pre(mixed $value): mixed
    {
        echo "<pre>";
        print_r($value);
        echo "</pre>";
        exit();
    }

    /**
     * Dumps information about a variable
     */
    public static function dd(mixed $value): mixed
    {
        echo var_dump($value);
        echo exit();
    }
}
