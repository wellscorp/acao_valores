<?php

namespace usuario\Entity;

use Base\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Events;

date_default_timezone_set('America/Sao_Paulo');

/**
 * Usuario
 *
 * @ORM\Table(name="USUARIO", indexes={@ORM\Index(name="IDX_1D204E473BB8898F", columns={"ID_TIPO_USUARIO"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="usuario\Repository\UsuarioRepository")
 */
class Usuario extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_USUARIO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NOME", type="string", length=100, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="EMAIL", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="SENHA", type="string", length=400, nullable=false)
     */
    private $senha;

    /**
     * @var integer
     *
     * @ORM\Column(name="STATUS", type="integer", nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="DT_CRIACAO", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $dtCriacao;

    /**
     * @var string
     *
     * @ORM\Column(name="HR_CRIACAO", type="decimal", precision=6, scale=0, nullable=true)
     */
    private $hrCriacao;

    /**
     * @var string
     *
     * @ORM\Column(name="DT_LOGIN", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $dtLogin;

    /**
     * @var string
     *
     * @ORM\Column(name="HR_LOGIN", type="decimal", precision=6, scale=0, nullable=true)
     */
    private $hrLogin;

    /**
     * @var \grupo\Entity\TipoUsuario
     *
     * @ORM\ManyToOne(targetEntity="grupo\Entity\TipoUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_TIPO_USUARIO", referencedColumnName="ID_TIPO_USUARIO")
     * })
     */
    private $idTipoUsuario;

    /**
     * @var \grupo\Entity\TipoUsuario
     *
     * @ORM\ManyToOne(targetEntity="grupo\Entity\Grupo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_GRUPO", referencedColumnName="ID_GRUPO")
     * })
     */
    private $idGrupo;



    /**
     * Get idUsuario
     *
     * @return integer
     */
    public function getIdUsuario()
    {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Usuario
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    
        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set senha
     *
     * @param string $senha
     *
     * @return Usuario
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    
        return $this;
    }

    /**
     * Get senha
     *
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Usuario
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set dtCriacao
     *
     * @param string $dtCriacao
     *
     * @param string $dtCriacao
     * @ORM\PrePersist
     *
     * @return Usuario
     */
    public function setDtCriacao()
    {
        Events::prePersist;
        $this->dtCriacao =  str_pad(date('Y').date('m').date('d'), 8, '0', STR_PAD_LEFT);
    
        return $this;
    }

    /**
     * Get dtCriacao
     *
     * @return string
     */
    public function getDtCriacao()
    {
        return $this->dtCriacao;
    }

    /**
     * Set hrCriacao
     *
     * @param string $hrCriacao
     *
     * @param string $dtCriacao
     * @ORM\PrePersist
     *
     * @return Usuario
     */
    public function setHrCriacao()
    {
        Events::prePersist;
        if(strlen(date('i')) == 1)
            $this->hrCriacao = date('H').'0'.date('i');
        else
            $this->hrCriacao = date('H').date('i');
    
        return $this;
    }

    /**
     * Get hrCriacao
     *
     * @return string
     */
    public function getHrCriacao()
    {
        return $this->hrCriacao;
    }

    /**
     * Set dtLogin
     *
     * @param string $dtLogin
     *
     * @return Usuario
     */
    public function setDtLogin($dtLogin)
    {
        $this->dtLogin = $dtLogin;
    
        return $this;
    }

    /**
     * Get dtLogin
     *
     * @return string
     */
    public function getDtLogin()
    {
        return $this->dtLogin;
    }

    /**
     * Set hrLogin
     *
     * @param string $hrLogin
     *
     * @return Usuario
     */
    public function setHrLogin($hrLogin)
    {
        $this->hrLogin = $hrLogin;
    
        return $this;
    }

    /**
     * Get hrLogin
     *
     * @return string
     */
    public function getHrLogin()
    {
        return $this->hrLogin;
    }

    /**
     * Set idTipoUsuario
     *
     * @param \grupo\Entity\TipoUsuario $idTipoUsuario
     *
     * @return Usuario
     */
    public function setIdTipoUsuario(\grupo\Entity\TipoUsuario $idTipoUsuario = null)
    {
        $this->idTipoUsuario = $idTipoUsuario;

        return $this;
    }

    /**
     * Get idTipoUsuario
     *
     * @return \grupo\Entity\TipoUsuario
     */
    public function getIdTipoUsuario()
    {
        return $this->idTipoUsuario;
    }

    /**
     * Set idTipoUsuario
     *
     * @param \grupo\Entity\TipoUsuario $idTipoUsuario
     *
     * @return Usuario
     */
    public function setIdGrupo(\grupo\Entity\Grupo $idGrupo = null)
    {
        $this->idGrupo = $idGrupo;

        return $this;
    }

    /**
     * Get idGrupo
     *
     * @return \grupo\Entity\Grupo
     */
    public function getIdGrupo()
    {
        return $this->idGrupo;
    }
}
