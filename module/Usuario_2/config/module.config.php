<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Usuario;
return array(


    'router' => array(
        'routes' => array(


            'Usuario' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/usuario[/:action][/:id][/page/:page]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Usuario\Controller\index',
                        'action'     => 'index',
                        'page' => 'd+'
                    ),
                ),

                'may_terminate' => true,
                'child_routes' => array(

                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[page/:page]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'page' => 'd+'
                            ),
                            'defaults' => array(
                                'action' => 'index',
                                'controller' => 'Usuario\Controller\Index',
                                'page' => 'd+'
                            ),
                        ),
                    ),



                ),
            ),

            'paginator' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/usuario[/:action][/:id][/page/:page]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'page' => 'd+'
                    ),
                    'defaults' => array(
                        'action' => 'index',
                        'controller' => 'Usuario\Controller\Index',
                        'page' => 0
                    ),
                ),
            ),



        ),
    ),


    'service_manager' => array(
        'abstract_factories' => array(

        ),
        'factories' => array(
            'Zend\Authentication\AuthenticationService' => 'Usuario\Adapter\Factory\AuthenticationFactory'
        ),
    ),

    'controllers' => array(
        'invokables' => array(
            'Usuario\Controller\Index' => 'Usuario\Controller\IndexController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../../Base/view/layout/layout.phtml',
            'error/404'               => __DIR__ . '/../../Base/view/error/404.phtml',
            'error/index'             => __DIR__ . '/../../Base/view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy'
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),

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
                ),
            ),
        ),
    )



);
