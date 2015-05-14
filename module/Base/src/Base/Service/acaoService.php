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

class acaoService extends AbstractService {

    public function __construct (EntityManager $em){

        $this->entity= 'Base\Entity\AcoAcao';
        parent::__construct($em);

    }


    public function save(Array $data= array()){

        //var_dump($data);die;

        return parent::save($data);
    }

} 