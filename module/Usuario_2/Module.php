<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Usuario;

use Usuario\Controller\IndexController;
use Usuario\Form\LoginForm;
use Usuario\Form\MudarSenhaForm;
use Usuario\Service\PermissaoService;
use Usuario\Service\UsuarioService;
use Zend\Authentication\AuthenticationService;
use Zend\Mvc\ModuleRouteListener;
use Usuario\Form\UsuarioForm;
use Zend\Mvc\MvcEvent;
use Zend\EventManager\EventManager;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        /**
         *
         * @var $sharedEventes Zend\EventManager\SharedEventManager
         */
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $sharedEvents= $eventManager->getSharedManager();

    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }


    public  function getServiceConfig(){

        return array(
            'factories' => array(
                'Usuario\Service\UsuarioService' => function($em){
                    return new UsuarioService($em->get('Doctrine\ORM\EntityManager'));
                },
                'Usuario\Form\UsuarioForm' => function($em){
                    return new UsuarioForm($em->get('Doctrine\ORM\EntityManager'));
                },
                'Zend\Authentication\AuthenticationService' => function($em){
                    return new AuthenticationService();
                },
                'Usuario\Form\LoginForm' => function($em){
                    return new LoginForm($em->get('Doctrine\ORM\EntityManager'));
                },
                'Usuario\Form\MudarSenhaForm' => function($em){
                    return new MudarSenhaForm($em->get('Doctrine\ORM\EntityManager'));
                },
                'Usuario\Service\PermissaoService' => function($em){
                    return new PermissaoService($em->get('Doctrine\ORM\EntityManager'));
                },
                'Usuario\Controller\IndexController' => function($em){
                    return new IndexController($em->get('Doctrine\ORM\EntityManager'));
                }
            )
        );
    }



}
