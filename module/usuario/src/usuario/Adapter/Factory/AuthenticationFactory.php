<?php
/**
 * Created by PhpStorm.
 * User: Welton
 * Date: 29/01/2015
 * Time: 00:16
 */

namespace usuario\Adapter\Factory;


use usuario\Adapter\Adapter;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AuthenticationFactory implements FactoryInterface {

    /**
     *  Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed|AuthenticationService
     *
     */

    public function createService(ServiceLocatorInterface $serviceLocator){
        $entityManager= $serviceLocator->get('Doctrine\ORM\EntityManager');
        return new AuthenticationService(new Session(), new Adapter($entityManager));

    }

} 