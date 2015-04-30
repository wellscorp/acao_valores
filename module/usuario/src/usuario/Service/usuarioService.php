<?php
/**
 * Created by PhpStorm.
 * User: Welton
 * Date: 29/11/2014
 * Time: 18:04
 */

namespace usuario\Service;

use Base\Service\AbstractService;
use Doctrine\ORM\EntityManager;

class usuarioService extends AbstractService {

    public function __construct (EntityManager $em){

        $this->entity= 'usuario\Entity\Usuario';
        parent::__construct($em);

    }


    public function save(Array $data= array()){

        if(isset($data['id_grupo']))
            $data['id_grupo']= $this->em->getRepository('grupo\Entity\Grupo')
                ->find($data['id_grupo']);

        return parent::save($data);
    }

} 