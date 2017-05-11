<?php

class Application_Form_TopicBootstrapForm extends Zend_Form
{

    public function init()
    {
        $this->setMethod('post'); // We can add method also, But by default zend use post method only.
        $this->setAttrib('class', 'form-horizontal'); // For Bootstrap Form
        $this->setAttrib('role', 'form'); // For Bootstrap Form
        
        //Add blog topic id element, which will be used at edit time to pass primary key as hidden field.
        $blog_id = new Zend_Form_Element_Hidden('id');
        $blog_id->setAttrib('class', 'form-control');
        $blog_id->setDecorators(
                $this->getBootstrapDecorator()
        );
        $this->addElement($blog_id);

        //Add an title element
        $title = new Zend_Form_Element_Text('title');
        $title->setAttrib('class', 'form-control');
        $title->setAttrib('placeholder', 'Your  title');
        $title->setDecorators(
                $this->getBootstrapDecorator()
        );
        $title->setLabel('Title:');
        $title->setRequired(true);
        $this->addElement($title);

        //Add an description element
        $description = new Zend_Form_Element_Textarea('notes');
        $description->setAttrib('class', 'form-control');
        $description->setAttrib('placeholder', 'Your ticket description');
        $description->setAttrib('rows', 6);
        $description->setDecorators(
                $this->getBootstrapDecorator()
        );
        $description->setLabel('Notes:');
        $description->setRequired(true);
        $this->addElement($description);



        $select = new Zend_Form_Element_Select('priority');
       // $select->setLabel('priority')->setRequired(true)->addValidator('NotEmpty', true);//cancel
        $select->setLabel('priority')->addValidator('NotEmpty', true);
        $select->setMultiOptions(array(
            '1' => 'Low',
            '2' => 'Normal',
            '3' => 'High',
            '4' => 'Emergency',
        ));




        $this->addElement($select);

        // set form attributes
        $this->setAttrib('enctype', 'multipart/form-data');
      //  $this->setAttrib('target',  'progressFrame');
        $this->setAttrib('id', 'files-upload-form');

        // create multiple file element
        $files = new Zend_Form_Element_File('files');
        $files->setDestination(UPLOAD_PATH);
        //$files->addValidator('Count', false, 5);
        $files->addValidator('Extension', false, 'jpg,png,gif');
        $files->setRequired(true);
     //   $files->setMultiFile(3); //multi upload


        $this->addElements(array($files));




        // Add CSRF protection.
        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));
    }

    /**
     * Apply Bootstrap decorators to an element.
     * @return array
     */
    private function getBootstrapDecorator()
    {
        return array(
            'ViewHelper',
            'Description',
            'Errors',
            array(
                'Label',
                array(
                    'tag' => 'label',
                    'class' => 'control-label'
                )
            ),
            array(
                'HtmlTag',
                array(
                    'tag' => 'div',
                    'class' => 'form-group'
                )
            )
        );
    }

}
