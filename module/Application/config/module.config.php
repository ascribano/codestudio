<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;

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
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => Controller\Factory\IndexControllerFactory::class,
            Controller\BookingController::class => Controller\Factory\BookingControllerFactory::class,
            Controller\FindController::class => Controller\Factory\FindControllerFactory::class,
        ],
        'invokables' => array(
            Controller\CustomerServiceController::class  => Controller\CustomerServiceController::class,

        ),
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
            'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
        ),
        'orm_default' => array(
            'drivers' => array(
                __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
            )
        )
    )
)
];
