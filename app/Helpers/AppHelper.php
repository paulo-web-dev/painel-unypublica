<?php

function inverteDataHora($date)
{

    if (strlen($date) > 10) {
        $day = substr($date, 0, 2);
        $month = substr($date, 3, 2);
        $year = substr($date, 6, 4);
        $time = substr($date, -8);
        $formated = $year . '-' . $month . '-' . $day . ' ' . $time;
    } else {
        $day = substr($date, 0, 2);
        $month = substr($date, 3, 2);
        $year = substr($date, 6, 4);
        $formated = $year . '-' . $month . '-' . $day;
    }

    return $formated;
}
