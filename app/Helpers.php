<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('priceFormat')) {
    function priceFormat($price, $currency = 'Rp. ')
    {
        $output = number_format($price);

        return $currency ? $currency . ' ' . $output : $output;
    }
}
