<?php

namespace SpiffyDataTables;

use Zend\Loader\PluginClassLoader, 
    Zend\Module\Manager,
    Zend\Module\Consumer\AutoloaderProvider;

class Module implements AutoloaderProvider
{
    public function init()
    {
        PluginClassLoader::addStaticMap(array(
            'datatable'      => 'SpiffyDataTables\View\Helper\DataTable',
        ));
    }
    
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            )
        );
    }
    
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}