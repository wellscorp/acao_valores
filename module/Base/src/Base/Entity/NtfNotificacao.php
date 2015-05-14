<?php

namespace Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NtfNotificacao
 *
 * @ORM\Table(name="NTF_NOTIFICACAO", indexes={@ORM\Index(name="IDX_21321FE0DFA4309E", columns={"NTF_ID_ACAO"}), @ORM\Index(name="IDX_21321FE04B29B391", columns={"NTF_ID_USUARIO"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Base\Repository\NtfNotificacaoRepository")
 */
class NtfNotificacao extends AbstractEntity
{
    /**
     * @var string
     *
     * @ORM\Column(name="NTF_ID_NOTIFICACAO", type="decimal", precision=18, scale=0, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="NTF_VALOR_ACAO", type="float", precision=53, scale=0, nullable=false)
     */
    private $ntfValorAcao;

    /**
     * @var \Base\Entity\AcoAcao
     *
     * @ORM\ManyToOne(targetEntity="Base\Entity\AcoAcao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="NTF_ID_ACAO", referencedColumnName="ACO_ID_ACAO")
     * })
     */
    private $ntfAcao;

    /**
     * @var \Base\Entity\UsrUsuario
     *
     * @ORM\ManyToOne(targetEntity="Base\Entity\UsrUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="NTF_ID_USUARIO", referencedColumnName="USR_ID_USUARIO")
     * })
     */
    private $ntfUsuario;



    /**
     * Get ntfIdNotificacao
     *
     * @return string
     */
    public function getNtfIdNotificacao()
    {
        return $this->id;
    }

    /**
     * Set ntfValorAcao
     *
     * @param float $ntfValorAcao
     *
     * @return NtfNotificacao
     */
    public function setNtfValorAcao($ntfValorAcao)
    {
        $this->ntfValorAcao = $ntfValorAcao;
    
        return $this;
    }

    /**
     * Get ntfValorAcao
     *
     * @return float
     */
    public function getNtfValorAcao()
    {
        return $this->ntfValorAcao;
    }

    /**
     * Set ntfAcao
     *
     * @param \Base\Entity\AcoAcao $ntfAcao
     *
     * @return NtfNotificacao
     */
    public function setNtfAcao(\Base\Entity\AcoAcao $ntfAcao = null)
    {
        $this->ntfAcao = $ntfAcao;
    
        return $this;
    }

    /**
     * Get ntfAcao
     *
     * @return \Base\Entity\AcoAcao
     */
    public function getNtfAcao()
    {
        return $this->ntfAcao;
    }

    /**
     * Set ntfUsuario
     *
     * @param \Base\Entity\UsrUsuario $ntfUsuario
     *
     * @return NtfNotificacao
     */
    public function setNtfUsuario(\Base\Entity\UsrUsuario $ntfUsuario = null)
    {
        $this->ntfUsuario = $ntfUsuario;
    
        return $this;
    }

    /**
     * Get ntfUsuario
     *
     * @return \Base\Entity\UsrUsuario
     */
    public function getNtfUsuario()
    {
        return $this->ntfUsuario;
    }
}
