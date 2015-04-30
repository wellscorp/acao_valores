<?php
/**
 * Created by PhpStorm.
 * User: Welton
 * Date: 29/01/2015
 * Time: 00:20
 */

namespace Usuario\Adapter;



use Usuario\Entity\Usuario;
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


        $user= $this->em->getRepository('Usuario\Entity\Usuario')
                    ->findByUsuario(new Usuario() , $this->getNome(), $this->getSenha());

        //var_dump($user[0]->getAtivo());die;

        if($user[0]->getIdEmpresa()->getStatus() == 1){
            if($user[0]->getAtivo() == 1){
                if($user){
                    return new Result(Result::SUCCESS, $user, array());
                }else{
                    return new Result(Result::FAILURE_CREDENTIAL_INVALID, null, array(
                        'Não foi possivel conectar. Login ou senha invalida!'
                    ));
                }
            }else{
                return new Result(Result::FAILURE_CREDENTIAL_INVALID, null, array(
                    'Usuário não ativo! Entre em contato com seu gestor.'
                ));
            }
        }else{
            return new Result(Result::FAILURE_CREDENTIAL_INVALID, null, array(
                'Empresa bloqueada!'
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