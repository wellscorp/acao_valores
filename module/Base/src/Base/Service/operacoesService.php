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

class operacoesService extends AbstractService {

    public function __construct (EntityManager $em){

        $this->entity= 'Base\Entity\OprOperacoes';
        parent::__construct($em);

    }


    public function save(Array $data= array()){

        $data['OPR_ACAO']= $this->em->getRepository('Base\Entity\AcoAcao')
            ->find($data['OPR_ACAO']);
        $data['OPR_USUARIO']= $this->em->getRepository('Base\Entity\UsrUsuario')
            ->find($data['OPR_USUARIO']);
        //var_dump($data);die;

        return parent::save($data);
    }

} 