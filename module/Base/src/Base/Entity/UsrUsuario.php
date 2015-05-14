<?php

namespace Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsrUsuario
 *
 * @ORM\Table(name="USR_USUARIO")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Base\Repository\UsrUsuarioRepository")
 */
class UsrUsuario extends AbstractEntity
{
    /**
     * @var string
     *
     * @ORM\Column(name="USR_ID_USUARIO", type="decimal", precision=18, scale=0, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="USR_EMAIL_USUARIO", type="string", length=50, nullable=false)
     */
    private $usrEmailUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="USR_NOME_USUARIO", type="string", length=50, nullable=false)
     */
    private $usrNomeUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="USR_SENHA", type="string", length=50, nullable=false)
     */
    private $usrSenha;



    /**
     * Get usrIdUsuario
     *
     * @return string
     */
    public function getUsrIdUsuario()
    {
        return $this->id;
    }

    /**
     * Set usrEmailUsuario
     *
     * @param string $usrEmailUsuario
     *
     * @return UsrUsuario
     */
    public function setUsrEmailUsuario($usrEmailUsuario)
    {
        $this->usrEmailUsuario = $usrEmailUsuario;
    
        return $this;
    }

    /**
     * Get usrEmailUsuario
     *
     * @return string
     */
    public function getUsrEmailUsuario()
    {
        return $this->usrEmailUsuario;
    }

    /**
     * Set usrNomeUsuario
     *
     * @param string $usrNomeUsuario
     *
     * @return UsrUsuario
     */
    public function setUsrNomeUsuario($usrNomeUsuario)
    {
        $this->usrNomeUsuario = $usrNomeUsuario;
    
        return $this;
    }

    /**
     * Get usrNomeUsuario
     *
     * @return string
     */
    public function getUsrNomeUsuario()
    {
        return $this->usrNomeUsuario;
    }

    /**
     * Set usrSenha
     *
     * @param string $usrSenha
     *
     * @return UsrUsuario
     */
    public function setUsrSenha($usrSenha)
    {
        $this->usrSenha = $usrSenha;
    
        return $this;
    }

    /**
     * Get usrSenha
     *
     * @return string
     */
    public function getUsrSenha()
    {
        return $this->usrSenha;
    }
}
