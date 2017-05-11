<?php

class Zend_View_Helper_DisplayDateLab
{
    function displayDateLab($timestamp, $format = Zend_Date::DATE_LONG)
    {
        $date = new Zend_Date($timestamp);
        return $date->get($format);
    }
}