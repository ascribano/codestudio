<?php

namespace Application\Form;

use Zend\Form\Form;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilter;
use Application\Validator\UserExistsValidator;
use Application\Entity\Services;

class ServiceForm extends Form
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
        parent::__construct('services');

        // Set POST method for this form
        $this->setAttribute('method', 'post');
        $this->setAttribute(
            'class',
            'form-horizontal'
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
            'type' => 'Zend\Form\Element\MultiCheckbox',
            'name' => 'services',
            'options' => array(
                'label' => 'Services',
                'value_options' => $this->getServicesOffered(),
            ),
            'attributes' => array(
                'value' => '1' //set checked to '1'
            )
        ));

        $this->add(array(
            'name' => 'address',
            'type' => 'text',
            'options' => array(
                'label' => 'Address',
            ),
        ));

        $this->add(array(
            'name' => 'postal_code',
            'type' => 'text',
            'options' => array(
                'label' => 'Postal Code',
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
            'name' => 'state',
            'type' => 'text',
            'options' => array(
                'label' => 'State',
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
            'name' => 'mobile',
            'type' => 'text',
            'options' => array(
                'label' => 'Mobile',
            ),
        ));

        $this->add(array(
            'name' => 'comments',
            'type' => 'text',
            'options' => array(
                'label' => 'Comments',
            ),
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


        $inputFilter->add([
            'name'     => 'address',
            'required' => true,
            'filters'  => [
                ['name' => 'StringTrim'],
            ]
        ]);
        $inputFilter->add([
            'name'     => 'postal_code',
            'required' => true,
            'filters'  => [
                ['name' => 'StringTrim'],
            ]
        ]);
        $inputFilter->add([
            'name'     => 'city',
            'required' => true,
            'filters'  => [
                ['name' => 'StringTrim'],
            ]
        ]);
        $inputFilter->add([
            'name'     => 'state',
            'required' => true,
            'filters'  => [
                ['name' => 'StringTrim'],
            ]
        ]);
        $inputFilter->add([
            'name'     => 'country',
            'required' => true,
            'filters'  => [
                ['name' => 'StringTrim'],
            ]
        ]);

    }

    public function getServicesOffered(){
        $services = $this->entityManager->getRepository(Services::class)->findAll();
        return $services;
    }
}