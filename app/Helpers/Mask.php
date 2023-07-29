<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse as JsonResponse;

class Mask
{
    /**
     * addMask
     *
     * @param  string $format
     * @param  string $text
     * @return string
     */
    public static function addMask(string $format, string $text): string
    {
        return vsprintf($format, str_split($text));
    }
}
