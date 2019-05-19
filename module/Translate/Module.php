<?php
    
    namespace Translate;

    use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
    use Zend\ModuleManager\Feature\ConfigProviderInterface;
    use Zend\Loader\ClassMapAutoloader;
    use Zend\Loader\StandardAutoloader;
    
    
    class Module implements AutoloaderProviderInterface, ConfigProviderInterface
    {
        public function getAutoloaderConfig() : array
        {
            return array(
                ClassMapAutoloader::class => array(
                    __DIR__ . '/autoload_classmap.php',
                ),
                StandardAutoloader::class => array(
                    'namespaces' => array(
                        __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                    ),
                ),
            );
        }
    
        public function getConfig()
        {
            return include __DIR__ . '/config/module.config.php';
        }
    }