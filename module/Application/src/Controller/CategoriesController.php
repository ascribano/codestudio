<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class CategoriesController extends AbstractActionController
{

    /**
     * Entity manager.
     * @var Doctrine\ORM\EntityManager
     */
    private $entityManager;

    private $usersManager;

    /**
     * Authentication service.
     * @var \Zend\Authentication\AuthenticationService
     */
    private $authService;

    /**
     * Auth manager.
     * @var Application\Service\AuthManager
     */
    private $authManager;

    public function __construct($entityManager, $categoriesManager, $authManager, $authService)
    {
        $this->entityManager    = $entityManager;
        $this->categoriesManager= $categoriesManager;
        $this->authManager      = $authManager;
        $this->authService      = $authService;
    }

    // This is the default "index" action of the controller.
    public function indexAction()
    {

        // Render the view template
        return new ViewModel();
    }

    public function getlistAction()
    {

        $response = $this->getResponse();
        $response->setStatusCode(200);
        $response->setContent(json_encode(['data'=>$this->categoriesManager->getList()]));

        $headers = $response->getHeaders();
        $headers->addHeaderLine('Content-Type', 'application/json');
        return $response;
    }

    public function addAction()
    {
        $request = $this->getRequest();

        if ($request->isXmlHttpRequest()){
            $this->categoriesManager->addCategory($this->getRequest()->getQuery());
            $result = ["result"=>"success", "message"=>"query success","data"=>[]];
        }else{
            $result = ["result"=>"fail"];
        }

        $response = $this->getResponse();
        $response->setStatusCode(200);
        $response->setContent(json_encode($result));

        $headers = $response->getHeaders();
        $headers->addHeaderLine('Content-Type', 'application/json');
        return $response;
    }

    public function editAction()
    {
        $request = $this->getRequest();

        if ($request->isXmlHttpRequest()){
            $this->categoriesManager->editCategory($this->getRequest()->getQuery());
            $result = ["result"=>"success", "message"=>"query success","data"=>[]];
        }else{
            $result = ["result"=>"fail"];
        }

        $response = $this->getResponse();
        $response->setStatusCode(200);
        $response->setContent(json_encode($result));

        $headers = $response->getHeaders();
        $headers->addHeaderLine('Content-Type', 'application/json');
        return $response;
    }

    public function deleteAction()
    {
        $request = $this->getRequest();

        if ($request->isXmlHttpRequest()){
            $this->categoriesManager->deleteCategory($this->getRequest()->getQuery());
            $result = ["result"=>"success", "message"=>"query success","data"=>[]];
        }else{
            $result = ["result"=>"fail"];
        }

        $response = $this->getResponse();
        $response->setStatusCode(200);
        $response->setContent(json_encode($result));

        $headers = $response->getHeaders();
        $headers->addHeaderLine('Content-Type', 'application/json');
        return $response;
    }
}
