<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Post;
use Application\Form\ProfessionalsForm;

/**
 * This is the main controller class of the Blog application. The 
 * controller class is used to receive user input,  
 * pass the data to the models and pass the results returned by models to the 
 * view for rendering.
 */
class ProfessionalsController extends AbstractActionController
{
    /**
     * Entity manager.
     * @var Doctrine\ORM\EntityManager 
     */
    public $entityManager;
    
    /**
     * Post manager.
     * @var Application\Service\ProfessionalsManager
     */
    private $professionalManager;
    
    /**
     * Constructor is used for injecting dependencies into the controller.
     */
    public function __construct($entityManager, $professionalManager)
    {
        $this->entityManager = $entityManager;
        $this->professionalManager = $professionalManager;
    }
    
    /**
     * This is the default "index" action of the controller. It displays the login page and registration form
     */
    public function indexAction() 
    {
        $form = new ProfessionalsForm();
        $this->layout('layout/login');


        // Check whether this post is a POST request.
        if ($this->getRequest()->isPost()) {

            // Get POST data.
            $data = $this->params()->fromPost();

            // Fill form with data.
            $form->setData($data);
            if ($form->isValid()) {

                // Get validated form data.
                $data = $form->getData();

                // Use post manager service to add new post to database.
                $this->professionalManager->addNewProfessional($data);

                // Redirect the user to "index" page.
                return $this->redirect()->toRoute('dashboard');
            }
        }

        // Render the view template.
        return new ViewModel([
            'form' => $form
        ]);
    }

}
