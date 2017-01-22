<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class IndexController extends AbstractActionController
{

    private $authManager;

    /**
     * Entity manager.
     * @var Doctrine\ORM\EntityManager
     */
    private $entityManager;

    // Constructor method is used to inject dependencies to the controller.
    public function __construct($entityManager, $authManager)
    {
        $this->entityManager    = $entityManager;
        $this->authManager      = $authManager;
    }

    // This is the default "index" action of the controller.
    public function indexAction()
    {
        // Render the view template
        return new ViewModel();
    }

    public function photoinfoAction()
    {
        $data = $this->getRequest()->getQuery();

        // Render the view template
        return new ViewModel(['id'=>$data->id]);
    }
}
