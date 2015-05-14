<?php
/**
 * Created by PhpStorm.
 * User: Welton
 * Date: 29/11/2014
 * Time: 18:04
 */

namespace Base\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;

class notificacaoService extends AbstractService {

    public function __construct (EntityManager $em){

        $this->entity= 'Base\Entity\NtfNotificacao';
        parent::__construct($em);

    }


    public function save(Array $data= array()){

        $data['NTF_ACAO']= $this->em->getRepository('Base\Entity\AcoAcao')
            ->find($data['NTF_ACAO']);
        $data['NTF_USUARIO']= $this->em->getRepository('Base\Entity\UsrUsuario')
            ->find($data['NTF_USUARIO']);
        //var_dump($data);die;

        return parent::save($data);
    }

} 