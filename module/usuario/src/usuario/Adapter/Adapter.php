<?php
/**
 * Created by PhpStorm.
 * User: Welton
 * Date: 29/01/2015
 * Time: 00:20
 */

namespace usuario\Adapter;



use usuario\Entity\Usuario;
use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;
use Doctrine\ORM\EntityManager;

class Adapter implements AdapterInterface {

    protected $nome;
    protected $senha;

    protected $em;

    public function __construct(EntityManager $em){

        $this->em= $em;

    }




    public function authenticate(){


        /*
        $user= $this->em->getRepository('usuario\Entity\Usuario')
                    ->findByUsuario(new Usuario() , $this->getNome(), $this->getSenha());
        */
        $data['senha']= md5($this->getSenha());
        $data['email']= $this->getNome();
        $user= $this->em->getRepository('usuario\Entity\Usuario')
            ->findBy($data);

        if($user){
            return new Result(Result::SUCCESS, $user, array());
        }else{
            return new Result(Result::FAILURE_CREDENTIAL_INVALID, null, array(
                'Não foi possivel conectar. Login ou senha invalida!'
            ));
        }


    }



    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $user
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

} 