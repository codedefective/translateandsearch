<?php
    
    use Translate\Controller\TranslateController;
    
    return [
        'controllers'  => [
            'invokables' => [
                'Translate\Controller\Translate' => TranslateController::class,
            ],
        ],
        'router'       => [
            'routes' => [
                'translate' => [
                    'type'    => 'segment',
                    'options' => [
                        'route'       => '/translate[/:action][/:id]',
                        'constraints' => [
                            'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            'id'     => '[0-9]+',
                        ],
                        'defaults'    => [
                            'controller' => 'Translate\Controller\Translate',
                            'action'     => 'index',
                        ],
                    ],
                ],
            ],
        ],
        'view_manager' => [
            'template_path_stack' => [
                'translate' => __DIR__ . '/../view',
            ],
        ],
    ];