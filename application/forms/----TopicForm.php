<?php

class Application_Form_TopicForm extends Zend_Form
{

    public function init()
    {
        // Add an hidden id element.
        $this->addElement('hidden', 'id', array(
            'required' => false,
            'filters' => array('StringTrim')
        ));

        // Add an title element.
        $this->addElement('text', 'dataname', array(
            'label' => 'Your blog topic title:',
            'required' => true,
            'filters' => array('StringTrim')
        ));

        // Add the comment element.
        $this->addElement('textarea', 'explanation', array(
            'label' => 'Your blog topic description:',
            'required' => true,
            'rows' => 6,
            'column' => 5
        ));

        $this->addElement('select', 'important', array(
            'label' => 'Your blog topic description:',
            'required' => true,
        ));




        // Add an upload element.
        $this->addElement('file', 'files', array(
            'label' => 'Your blog topic title:',
        ));



        // Add CSRF protection.
        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));
    }

}
