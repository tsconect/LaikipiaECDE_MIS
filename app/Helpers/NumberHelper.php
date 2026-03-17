<?php

namespace App\Helpers;

class NumberHelper
{
    /**
     * Format a number into a short readable string (K, M, B, T).
     *
     * @param float|int $number
     * @param int $precision
     * @return string
     */
    public static function shorten($number, $precision = 1)
    {
        // Handle 0 or null
        if (!$number) {
            return '0';
        }

        // Handle negative numbers
        $sign = $number < 0 ? '-' : '';
        $number = abs($number);

        if ($number < 1000) {
            return $sign . number_format($number, $precision);
        } elseif ($number < 1000000) {
            // Thousands (K)
            return $sign . number_format($number / 1000, $precision) . 'K';
        } elseif ($number < 1000000000) {
            // Millions (M)
            return $sign . number_format($number / 1000000, $precision) . 'M';
        } elseif ($number < 1000000000000) {
            // Billions (B)
            return $sign . number_format($number / 1000000000, $precision) . 'B';
        } else {
            // Trillions (T)
            return $sign . number_format($number / 1000000000000, $precision) . 'T';
        }
    }
}
