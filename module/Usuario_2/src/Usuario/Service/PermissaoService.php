<?php
/**
 * Created by PhpStorm.
 * User: Welton
 * Date: 29/11/2014
 * Time: 18:04
 */

namespace Usuario\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;

class PermissaoService extends AbstractService {


    public $entidade;

    public function __construct (EntityManager $em){

        $this->entity= 'Usuario\Entity\Permissao';
        parent::__construct($em);


    }

    public function save(Array $data= array()){


        //var_dump($data);die;
        /*
        if(isset($data['id_usuario']))
            $data['id_usuario']= $this->em->getRepository('Usuario\Entity\Usuario')
                ->find($data['id_usuario']);
        */


        return parent::save($data);
    }




    public function pesquisaPorId(Array $data = array(), $id){

        //$entity= $this->em->getRepository($this->entity)->find($id);
        $entity= $this->em->getReference($this->entity, $id);



       // $this->em->persist($entity);
       // $this->em->find($entity,$data['id'] );
       // $this->em->flush();

        return $entity;
    }



} 