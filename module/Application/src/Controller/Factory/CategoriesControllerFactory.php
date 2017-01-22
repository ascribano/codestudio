<?php
namespace Application\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Application\Service\CategoriesManager;
use Application\Controller\CategoriesController;
use Application\Service\AuthManager;

/**
 * This is the factory for IndexController. Its purpose is to instantiate the
 * controller.
 */
class CategoriesControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager      = $container->get('doctrine.entitymanager.orm_default');
        $categoriesManager  = $container->get(CategoriesManager::class);
        $authManager        = $container->get(AuthManager::class);
        $authService        = $container->get(\Zend\Authentication\AuthenticationService::class);
        
        // Instantiate the controller and inject dependencies
        return new CategoriesController($entityManager, $categoriesManager, $authManager, $authService);
    }
}




