<?php

namespace Application\Form;

use Zend\Form\Form;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilter;
use Application\Validator\UserExistsValidator;

class UsersForm extends Form
{

    /**
     * Entity manager.
     * @var Doctrine\ORM\EntityManager;
     */
    private $entityManager;

    /**
     * Current user.
     * @var Application\Entity\Users
     */
    private $user = null;

    /**
     * Constructor.
     */
    public function __construct($entityManager, $user = null)
    {
        // Define form name
        parent::__construct('registration');

        // Set POST method for this form
        $this->setAttribute('method', 'post');
        $this->setAttribute(
            'class',
            'register-form'
        );

        $this->entityManager = $entityManager;
        $this->user = $user;

        $this->addElements();
        $this->addInputFilter();
    }

    /**
     * This method adds elements to form (input fields and submit button).
     */
    protected function addElements()
    {
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
            'name' => 'submit',
            'type'  => 'button',
            'options' => [
                'label' => 'Create'
            ],'attributes' => [
                'id' => 'register-submit-btn',
                'class'=>'btn btn-success uppercase pull-right'
            ],
        ]);
    }

    /**
     * This method creates input filter (used for form filtering/validation).
     */
    private function addInputFilter()
    {
        // Create main input filter
        $inputFilter = new InputFilter();
        $this->setInputFilter($inputFilter);

        // Add input for "email" field
        $inputFilter->add([
            'name'     => 'email',
            'required' => true,
            'filters'  => [
                ['name' => 'StringTrim'],
            ],
            'validators' => [
                [
                    'name'    => 'StringLength',
                    'options' => [
                        'min' => 1,
                        'max' => 128
                    ],
                ],
                [
                    'name' => 'EmailAddress',
                    'options' => [
                        'allow' => \Zend\Validator\Hostname::ALLOW_DNS,
                        'useMxCheck'    => false,
                    ],
                ],
                [
                    'name' => UserExistsValidator::class,
                    'options' => [
                        'entityManager' => $this->entityManager,
                        'user' => $this->user
                    ],
                ],
            ],
        ]);
    }
}