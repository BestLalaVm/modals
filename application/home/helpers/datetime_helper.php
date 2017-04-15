<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 2/28/2017
 * Time: 10:20 PM
 */
function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}