<?php
namespace Application\Service\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Application\Service\UsersManager;

/**
 * This is the factory for ProfessionalsManager. Its purpose is to instantiate the
 * service.
 */
class UsersManagerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $authenticationService = $container->get(\Zend\Authentication\AuthenticationService::class);
        
        // Instantiate the service and inject dependencies
        return new UsersManager($entityManager, $authenticationService);
    }
}




