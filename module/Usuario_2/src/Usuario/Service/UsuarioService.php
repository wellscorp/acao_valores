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

class UsuarioService extends AbstractService {


    public $entidade;

    public function __construct (EntityManager $em){

        $this->entity= 'Usuario\Entity\Usuario';
        parent::__construct($em);


    }

    public function save(Array $data= array()){



        if(isset($data['id_cliente']))
            $data['id_cliente']= $this->em->getRepository('Cliente\Entity\Cliente')
                ->find($data['id_cliente']);
        if(isset($data['id_vendedor']))
            $data['id_vendedor']= $this->em->getRepository('Base\Entity\Vendedor')
                ->find($data['id_vendedor']);
        if(isset($data['id_agente']))
            $data['id_agente']= $this->em->getRepository('Base\Entity\Agente')
                ->find($data['id_agente']);
        if(isset($data['id_gestor']))
            $data['id_gestor']= $this->em->getRepository('Base\Entity\Gestor')
                ->find($data['id_gestor']);
        if(isset($data['id_tecnico']))
            $data['id_tecnico']= $this->em->getRepository('Base\Entity\Tecnico')
                ->find($data['id_tecnico']);
        if(isset($data['id_empresa']))
            $data['id_empresa']= $this->em->getRepository('Base\Entity\Empresa')
                ->find($data['id_empresa']);
        if(isset($data['id_permissao']))
            $data['id_permissao']= $this->em->getRepository('Usuario\Entity\Permissao')
                ->find($data['id_permissao']);


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