<?php

namespace Usuario\Repository;
use Usuario\Entity\Usuario;

/**
 * UsuarioRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UsuarioRepository extends \Doctrine\ORM\EntityRepository
{


    public function findByUsuario(Usuario $usuario, $user, $senha){

        $senha= md5($senha);
        $produto= $this->createQueryBuilder('p')
            ->where('p.email = :a1')
            ->andWhere('p.senha = :a2')
            ->setParameter('a1', $user)
            ->setParameter('a2', $senha)
            ->getQuery()->getResult();
        //echo var_dump($produto);die;

        if(!empty($produto))
            return $produto;
        else
            return false;
    }

    public function findByEmail(Usuario $usuario, $email){

        $produto= $this->createQueryBuilder('p')
            ->where('p.email = :a1')
            ->setParameter('a1', $email)
            ->getQuery()->getResult();
        //echo var_dump($produto);die;

        if(!empty($produto))
            return $produto;
        else
            return false;
    }

}
