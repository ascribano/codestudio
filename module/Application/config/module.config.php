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
            'application' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'customerservice' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/customerservice[/:action]',
                    'defaults' => [
                        'controller' => Controller\CustomerServiceController::class,
                        'action'     => 'manager',
                    ],
                ],
            ],
            'booking' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/booking[/:action]',
                    'defaults' => [
                        'controller' => Controller\BookingController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'find' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/find[/:action]',
                    'defaults' => [
                        'controller' => Controller\FindController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'professionals' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/professionals',
                    'defaults' => [
                        'controller' => Controller\ProfessionalsController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'dashboard' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'users' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/users[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[a-zA-Z0-9_-]*',
                    ],
                    'defaults' => [
                        'controller'    => Controller\UsersController::class,
                        'action'        => 'index',
                    ],
                ],
            ],
            'welcome' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/users/welcome',
                    'defaults' => [
                        'controller'    => Controller\UsersController::class,
                        'action'        => 'welcome',
                    ],
                ],
            ],
            'dashboard' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/users/dashboard',
                    'defaults' => [
                        'controller'    => Controller\UsersController::class,
                        'action'        => 'dashboard',
                    ],
                ],
            ],
            'service' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/users/service',
                    'defaults' => [
                        'controller'    => Controller\UsersController::class,
                        'action'        => 'service',
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
            'reset-password' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/reset-password',
                    'defaults' => [
                        'controller' => Controller\UserController::class,
                        'action'     => 'resetPassword',
                    ],
                ],
            ],
            'set-password' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/set-password',
                    'defaults' => [
                        'controller' => Controller\UserController::class,
                        'action'     => 'setPassword',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => Controller\Factory\IndexControllerFactory::class,
            Controller\BookingController::class => Controller\Factory\BookingControllerFactory::class,
            Controller\FindController::class => Controller\Factory\FindControllerFactory::class,
            Controller\ProfessionalsController::class => Controller\Factory\ProfessionalsControllerFactory::class,
            Controller\UsersController::class => Controller\Factory\UsersControllerFactory::class,
            Controller\AuthController::class => Controller\Factory\AuthControllerFactory::class,
        ],
        'invokables' => array(
            Controller\CustomerServiceController::class  => Controller\CustomerServiceController::class,

        ),
    ],
    'session_containers' => [
        'UserRegistration'
    ],
    // The 'access_filter' key is used by the User module to restrict or permit
    // access to certain controller actions for unauthorized visitors.
    'access_filter' => [
        'options' => [
            // The access filter can work in 'restrictive' (recommended) or 'permissive'
            // mode. In restrictive mode all controller actions must be explicitly listed
            // under the 'access_filter' config key, and access is denied to any not listed
            // action for not logged in users. In permissive mode, if an action is not listed
            // under the 'access_filter' key, access to it is permitted to anyone (even for
            // not logged in users. Restrictive mode is more secure and recommended to use.
            'mode' => 'permissive'
        ],
        'controllers' => [
            Controller\UsersController::class => [
                ['actions' => ['index', 'message', 'setPassword'], 'allow' => '*'],
                ['actions' => ['dashboard', 'welcome'], 'allow' => '@']
            ],
            Controller\IndexController::class => [
                ['actions' => ['index'], 'allow' => '*'],
                ['actions' => ['add', 'edit', 'view', 'changePassword'], 'allow' => '@']
            ],
        ]
    ],
    'service_manager' => [
        'factories' => [
            \Zend\Authentication\AuthenticationService::class => Service\Factory\AuthenticationServiceFactory::class,
            Service\AuthAdapter::class => Service\Factory\AuthAdapterFactory::class,
            Service\ProfessionalsManager::class => Service\Factory\ProfessionalsManagerFactory::class,
            Service\UsersManager::class => Service\Factory\UsersManagerFactory::class,
            Service\AuthManager::class => Service\Factory\AuthManagerFactory::class,
        ],
    ],
    'view_helpers' => [
        'factories' => [
            //View\Helper\Menu::class => InvokableFactory::class,
            View\Helper\Breadcrumbs::class => InvokableFactory::class,
        ],
        'aliases' => [
            'mainMenu' => View\Helper\Menu::class,
            'pageBreadcrumbs' => View\Helper\Breadcrumbs::class,
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
