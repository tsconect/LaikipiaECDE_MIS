<?php

namespace App\Helpers;

class PhoneHelper
{
  

     public static function normalizePhoneNumber($number)
    {
     
      $regex = [
        'airtel' => '/^(?:\+?254|0)?(7(?:[38]\d{7}|5[0-6]\d{6}))$/',
        'equitel' => '/^(?:\+?254|0)?(76[0-7]\d{6})$/',
        'safaricom' => '/^(?:\+?254|0)?((?:7[01249]\d{7}|1[01234]\d{7}|75[789]\d{6}|76[89]\d{6}))$/',
        'telkom' => '/^(?:\+?254|0)?(77\d{7})$/',
        ];

        foreach ($regex as $operator => $re) {
            if (preg_match($re, $number, $matches)) {
                // $matches[1] contains the actual digits after stripping 254/0
                return '254' . $matches[1];
            }
        }

      
        return false;
    }


}