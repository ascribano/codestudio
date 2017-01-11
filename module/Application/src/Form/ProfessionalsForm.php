<?php

namespace Application\Form;

use Zend\Form\Form;

class ProfessionalsForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('registration');
        $this->setAttribute(
            'class',
            'register-form'
        );
        $this->add(array(
            'name' => 'fullname',
            'type' => 'text',
            'options' => array(
                'label' => 'Full name',
            ),
        ));
        $this->add(array(
            'name' => 'email',
            'type' => 'text',
            'options' => array(
                'label' => 'Email',
            ),
        ));
        $this->add(array(
            'name' => 'mobile',
            'type' => 'text',
            'options' => array(
                'label' => 'Mobile',
            ),
        ));
        $this->add(array(
            'name' => 'address',
            'type' => 'text',
            'options' => array(
                'label' => 'Address',
            ),
        ));
        $this->add(array(
            'name' => 'city',
            'type' => 'text',
            'options' => array(
                'label' => 'City',
            ),
        ));
        $this->add(array(
            'name' => 'country',
            'type' => 'text',
            'options' => array(
                'label' => 'Country',
            ),
        ));
        $this->add(array(
            'name' => 'username',
            'type' => 'text',
            'options' => array(
                'label' => 'Username',
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'type' => 'password',
            'options' => array(
                'label' => 'Password',
            ),
            'attributes' => [
                'id' => 'password',
            ],
        ));
        // Add the submit button
        $this->add([
            'type'  => 'submit',
            'name' => 'submit',
            'attributes' => [
                'value' => 'Create',
                'id' => 'submitbutton',
            ],
        ]);
    }
}