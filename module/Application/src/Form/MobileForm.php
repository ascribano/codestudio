<?php

namespace Application\Form;

use Zend\Form\Form;

class MobileForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('mobile');

        $this->add(array(
            'name' => 'mobile',
            'type' => 'Application\Form\Element\Phone',
            'options' => array(
                'label' => 'Mobile:',
            ),
        ));
        $this->add(array(
            'name' => 'message',
            'type' => 'Textarea',
            'options' => array(
                'label' => 'Message:',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Send SMS',
                'id' => 'submitbutton',
            ),
        ));
}
}