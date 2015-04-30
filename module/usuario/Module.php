<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace usuario;

use usuario\Service\usuarioService;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Authentication\AuthenticationService;
use Zend\EventManager\EventManager;


class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $sharedEvents= $eventManager->getSharedManager();

        // AO CHAMAR A INSTANCIA ABSTRACT ACTION CONTROLER ELE EXECUTA O EVENTO
        $sharedEvents->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($ev){

            /**
             * @var $ev Zend\Mvc\MvcEvent
             * @var $auth Zend\Authentication\AuthenticationService
             */
            /*
            // CONFIRMA SE FOI LOGADO
            $auth= $ev->getApplication()->getServiceManager()->get('Zend\Authentication\AuthenticationService');
            //$auth= new AuthenticationService();
            //var_dump($ev->getRouteMatch()->getParam('controller'));die;
            $t= $ev->getTarget();
            // OBTEM O CONTROLLER ATUAL
            //if(isset($_SESSION['identity']))
            //    $_SESSION['identity']= $t->getEm()->getRepository('Usuario\Entity\Usuario')->find($_SESSION['identity']->getIdUsuario());

            if($auth->hasIdentity()){
                return;
            }

            // LIBERAR ACESSO APENAS PARA ACTION LOGIN
            if($ev->getRouteMatch()->getParam('controller') == 'usuario\Controller\Login'){
                return;
            }
            $t->redirect()->toRoute('login', array('controller' => 'Login', 'action' => 'index' ));

            */

        },99);
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
                'usuario\service\usuarioService' => function($em){
                    return new usuarioService($em->get('Doctrine\ORM\EntityManager'));
                }
            )
        );
    }



}
