<?php
/*helper nasıl yapılır denemesi*/
class Zend_Controller_Action_Helper_Multiples extends Zend_Controller_Action_Helper_Abstract
{
    function direct($a)
    {
        return $a * 4;
    }

    function thrice($a)
    {
        return $a * 2;
    }
}

