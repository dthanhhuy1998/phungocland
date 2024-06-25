<?php

    function nice_number($n) 
    {
        // first strip any formatting;
        $n = (0+str_replace(",", "", $n));

        // is this a number?
        if (!is_numeric($n)) return false;

        // now filter it;
        if ($n >= 1000000000000) return round(($n/1000000000000), 2).' nghìn tỷ';
        elseif ($n >= 1000000000) return round(($n/1000000000), 2).' tỷ';
        elseif ($n >= 1000000) return round(($n/1000000), 2).' triệu';
        elseif ($n >= 1000) return round(($n/1000), 2).' nghìn';

        return number_format($n);
    }

    function date_vi($date) {
        return date_format(date_create($date), 'd/m/Y');
    }

    function datetime_vi($date) {
        return date_format(date_create($date), 'd/m/Y H:i');
    }

    function heading($routeName) {
        return $routeName . ' &lsaquo; Cty TNHH Thương mại và Dịch vụ Phú Ngọc Land';
    }