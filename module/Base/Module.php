<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Base;

use Base\Form\AcaoForm;
use Base\Form\UsuarioForm;
use Base\Service\acaoService;
use Base\Service\notificacaoService;
use Base\Service\operacoesService;
use Base\Service\usuarioService;
use Zend\Mvc\I18n\Translator;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    /**
     * @param MvcEvent $e
     */
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        /*
        $translator= new Translator();
        $translator->addTranslationFile(
            'phpArray',
            './vendor/zendframework/zendframework/resources/languages/pt_BR/Zend_Validate.php',
            'default',
            'pt_BR'
        );
        \Zend\Validator\AbstractValidator::setDefaultTranslator($translator);
        */
    }

    public function getConfig()
    {
        return include __DIR__ . '\config\module.config.php';
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
                'Base\form\AcaoForm' => function($em){
                    return new AcaoForm($em->get('Doctrine\ORM\EntityManager'));
                },
                'Base\Service\acaoService' => function($em){
                    return new acaoService($em->get('Doctrine\ORM\EntityManager'));
                },
                'Base\Form\UsuarioForm' => function($em){
                    return new UsuarioForm($em->get('Doctrine\ORM\EntityManager'));
                },
                'Base\Service\usuarioService' => function($em){
                    return new usuarioService($em->get('Doctrine\ORM\EntityManager'));
                },
                'Base\Service\operacoesService' => function($em){
                    return new operacoesService($em->get('Doctrine\ORM\EntityManager'));
                },
                'Base\Service\notificacaoService' => function($em){
                    return new notificacaoService($em->get('Doctrine\ORM\EntityManager'));
                }
            )
        );
    }

}
