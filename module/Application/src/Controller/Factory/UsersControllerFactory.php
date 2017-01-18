<?php
namespace Application\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Application\Service\UsersManager;
use Application\Controller\UsersController;
use Application\Service\AuthManager;

/**
 * This is the factory for IndexController. Its purpose is to instantiate the
 * controller.
 */
class UsersControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $usersManager = $container->get(UsersManager::class);
        $authManager = $container->get(AuthManager::class);
        $authService = $container->get(\Zend\Authentication\AuthenticationService::class);
        
        // Instantiate the controller and inject dependencies
        return new UsersController($entityManager, $usersManager, $authManager, $authService);
    }
}




