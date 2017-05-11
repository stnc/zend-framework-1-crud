<?php
class Zend_View_Helper_DisplayAddress
{
    function displayAddress($object)
    {
        $fields = array('address1', 'address2',
            'town', 'county', 'postcode', 'country');
        $address = array();
        foreach ($fields as $field) {
            if (!is_null($object->$field)) {
                $value = trim($object->$field);
                if ($value != '') {
                    $address[] = $value;
                }
            }
        }
        return implode("\n", $address);
    }
}