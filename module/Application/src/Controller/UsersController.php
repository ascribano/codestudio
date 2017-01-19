<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Form\UsersForm;
use Zend\Authentication\Result;
use Zend\Uri\Uri;


class UsersController extends AbstractActionController
{
    protected $data;
    protected $table;

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

    public function __construct($entityManager, $usersManager, $authManager, $authService)
    {
        $this->entityManager    = $entityManager;
        $this->usersManager     = $usersManager;
        $this->authManager      = $authManager;
        $this->authService      = $authService;
    }

    // This is the default "index" action of the controller. It displays the
    // Posts page containing the recent blog posts.
    public function indexAction()
    {
        $this->layout()->setVariable('showmenu', false);
        $form = new UsersForm($this->entityManager);

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
                $this->usersManager->addNewUser($data);

                $result = $this->authManager->login($data['email'],
                    $data['password'], $data['remember_me']);

                // Check result.
                if ($result->getCode() == Result::SUCCESS) {
                    // Redirect the user to "index" page.
                    return $this->redirect()->toRoute('welcome');
                }
            }
        }

        // Render the view template
        return new ViewModel([
            'form' => $form
        ]);
    }

    public function welcomeAction(){

        // Use post manager service to add new post to database.
        $user = $this->usersManager->getUserInfo($this->authService->getIdentity());
        $viewModel = new ViewModel();
        $viewModel->setVariables(array('user' => $user))
            ->setTerminal(true);

        return $viewModel;
    }

    public function serviceAction()
    {
        $services = $this->usersManager->getServicesOffered();

        if ($this->getRequest()->isPost()) {
            $data = $this->params()->fromPost();
            $this->usersManager->addNewOrder($data);
            return $this->redirect()->toRoute('find');
        }

        return new ViewModel(['services'=>$services]);
    }

    public function dashboardAction()
    {
        // Render the view template
        return new ViewModel(['user'=>$user]);
    }

    /**
     * The "logout" action performs logout operation.
     */
    public function logoutAction()
    {
        $this->authManager->logout();

        return $this->redirect()->toRoute('home');
    }
}
