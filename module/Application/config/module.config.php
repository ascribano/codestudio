<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'photoinfo' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/photoinfo',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'photoinfo',
                    ],
                ],
            ],
            'categories' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/categories[/:action]',
                    'defaults' => [
                        'controller' => Controller\CategoriesController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'login' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/login',
                    'defaults' => [
                        'controller' => Controller\AuthController::class,
                        'action'     => 'login',
                    ],
                ],
            ],
            'logout' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/logout',
                    'defaults' => [
                        'controller' => Controller\AuthController::class,
                        'action'     => 'logout',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => Controller\Factory\IndexControllerFactory::class,
            Controller\AuthController::class => Controller\Factory\AuthControllerFactory::class,
            Controller\CategoriesController::class => Controller\Factory\CategoriesControllerFactory::class,
        ],
    ],
    'session_containers' => [
        'UserRegistration'
    ],
    // The 'access_filter' key is used by the User module to restrict or permit
    // access to certain controller actions for unauthorized visitors.
    'access_filter' => [
        'options' => [
            'mode' => 'permissive'
        ],
        'controllers' => [
            Controller\CategoriesController::class => [
                ['actions' => ['index'], 'allow' => '@'],
            ],
            Controller\IndexController::class => [
                ['actions' => ['index'], 'allow' => '*'],
            ],
        ]
    ],
    'service_manager' => [
        'factories' => [
            \Zend\Authentication\AuthenticationService::class => Service\Factory\AuthenticationServiceFactory::class,
            Service\AuthAdapter::class => Service\Factory\AuthAdapterFactory::class,
            Service\AuthManager::class => Service\Factory\AuthManagerFactory::class,
            Service\CategoriesManager::class => Service\Factory\CategoriesManagerFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'form_elements' => [
        'invokables' => [ 'phone' => 'Application\Form\Element\Phone' ]
    ],
    'doctrine' => array(
    'driver' => array(
        __NAMESPACE__ . '_driver' => array(
            'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
            'cache' => 'array',
            'paths' => array(__DIR__ . '/../src/Entity')
        ),
        'orm_default' => array(
            'drivers' => array(
                __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
            )
        )
    )
)
];
