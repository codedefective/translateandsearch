<?php
    
    use Application\Controller\IndexController;
    use Zend\Mvc\Router\Http\Literal;
    
    return [
        'router'       => [
            'routes' => [
                'home' => [
                    'type'    => Literal::class,
                    'options' => [
                        'route'    => '/',
                        'defaults' => [
                            'controller' => 'Application\Controller\Index',
                            'action'     => 'index',
                        ],
                    ],
                ],
                'application' => [
                    'type'          => 'Literal',
                    'options'       => [
                        'route'    => '/application',
                        'defaults' => [
                            '__NAMESPACE__' => 'Application\Controller',
                            'controller'    => 'Index',
                            'action'        => 'index',
                        ],
                    ],
                    'may_terminate' => true,
                    'child_routes'  => [
                        'default' => [
                            'type'    => 'Segment',
                            'options' => [
                                'route'       => '/[:controller[/:action]]',
                                'constraints' => [
                                    'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                ],
                                'defaults'    => [],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'translator'   => [
            'locale'                    => 'en_US',
            'translation_file_patterns' => [
                [
                    'type'     => 'gettext',
                    'base_dir' => __DIR__ . '/../language',
                    'pattern'  => '%s.mo',
                ],
            ],
        ],
        'controllers'  => [
            'invokables' => [
                'Application\Controller\Index' => IndexController::class
            ],
        ],
        'view_manager' => [
            'display_not_found_reason' => true,
            'display_exceptions'       => true,
            'doctype'                  => 'HTML5',
            'not_found_template'       => 'error/404',
            'exception_template'       => 'error/index',
            'template_map'             => [
                'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
                'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
                'translate/index'         => __DIR__ . '/../view/layout/layout.phtml',
                'translate/index/index'   => __DIR__ . '/../../Translate/view/translate/translate/index.phtml',
                'error/404'               => __DIR__ . '/../view/error/404.phtml',
                'error/index'             => __DIR__ . '/../view/error/index.phtml',
            ],
            'template_path_stack'      => [
                __DIR__ . '/../view',
            ],
        ],
        'console' => [
            'router' => [
                'routes' => [],
            ],
        ],
    ];
