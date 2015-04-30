<?php

namespace Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OprOperacoes
 *
 * @ORM\Table(name="OPR_OPERACOES", indexes={@ORM\Index(name="IDX_2ADFDADBE6ED5C59", columns={"OPR_ID_ACAO"}), @ORM\Index(name="IDX_2ADFDADB1981EEF2", columns={"OPR_ID_USUARIO"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Base\Repository\OprOperacoesRepository")
 */
class OprOperacoes extends AbstractEntity
{
    /**
     * @var string
     *
     * @ORM\Column(name="OPR_ID_OPERACAO", type="decimal", precision=18, scale=0, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $oprIdOperacao;

    /**
     * @var integer
     *
     * @ORM\Column(name="OPR_QTD", type="integer", nullable=false)
     */
    private $oprQtd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="OPR_DATA_OPERACAO", type="date", nullable=false)
     */
    private $oprDataOperacao;

    /**
     * @var float
     *
     * @ORM\Column(name="OPR_VALOR_COMPRA", type="float", precision=53, scale=0, nullable=false)
     */
    private $oprValorCompra;

    /**
     * @var float
     *
     * @ORM\Column(name="OPR_VALOR_VENDA", type="float", precision=53, scale=0, nullable=true)
     */
    private $oprValorVenda;

    /**
     * @var \Base\Entity\AcoAcao
     *
     * @ORM\ManyToOne(targetEntity="Base\Entity\AcoAcao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="OPR_ID_ACAO", referencedColumnName="ACO_ID_ACAO")
     * })
     */
    private $oprAcao;

    /**
     * @var \Base\Entity\UsrUsuario
     *
     * @ORM\ManyToOne(targetEntity="Base\Entity\UsrUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="OPR_ID_USUARIO", referencedColumnName="USR_ID_USUARIO")
     * })
     */
    private $oprUsuario;



    /**
     * Get oprIdOperacao
     *
     * @return string
     */
    public function getOprIdOperacao()
    {
        return $this->oprIdOperacao;
    }

    /**
     * Set oprQtd
     *
     * @param integer $oprQtd
     *
     * @return OprOperacoes
     */
    public function setOprQtd($oprQtd)
    {
        $this->oprQtd = $oprQtd;
    
        return $this;
    }

    /**
     * Get oprQtd
     *
     * @return integer
     */
    public function getOprQtd()
    {
        return $this->oprQtd;
    }

    /**
     * Set oprDataOperacao
     *
     * @param \DateTime $oprDataOperacao
     *
     * @return OprOperacoes
     */
    public function setOprDataOperacao($oprDataOperacao)
    {
        $this->oprDataOperacao = $oprDataOperacao;
    
        return $this;
    }

    /**
     * Get oprDataOperacao
     *
     * @return \DateTime
     */
    public function getOprDataOperacao()
    {
        return $this->oprDataOperacao;
    }

    /**
     * Set oprValorCompra
     *
     * @param float $oprValorCompra
     *
     * @return OprOperacoes
     */
    public function setOprValorCompra($oprValorCompra)
    {
        $this->oprValorCompra = $oprValorCompra;
    
        return $this;
    }

    /**
     * Get oprValorCompra
     *
     * @return float
     */
    public function getOprValorCompra()
    {
        return $this->oprValorCompra;
    }

    /**
     * Set oprValorVenda
     *
     * @param float $oprValorVenda
     *
     * @return OprOperacoes
     */
    public function setOprValorVenda($oprValorVenda)
    {
        $this->oprValorVenda = $oprValorVenda;
    
        return $this;
    }

    /**
     * Get oprValorVenda
     *
     * @return float
     */
    public function getOprValorVenda()
    {
        return $this->oprValorVenda;
    }

    /**
     * Set oprAcao
     *
     * @param \Base\Entity\AcoAcao $oprAcao
     *
     * @return OprOperacoes
     */
    public function setOprAcao(\Base\Entity\AcoAcao $oprAcao = null)
    {
        $this->oprAcao = $oprAcao;
    
        return $this;
    }

    /**
     * Get oprAcao
     *
     * @return \Base\Entity\AcoAcao
     */
    public function getOprAcao()
    {
        return $this->oprAcao;
    }

    /**
     * Set oprUsuario
     *
     * @param \Base\Entity\UsrUsuario $oprUsuario
     *
     * @return OprOperacoes
     */
    public function setOprUsuario(\Base\Entity\UsrUsuario $oprUsuario = null)
    {
        $this->oprUsuario = $oprUsuario;
    
        return $this;
    }

    /**
     * Get oprUsuario
     *
     * @return \Base\Entity\UsrUsuario
     */
    public function getOprUsuario()
    {
        return $this->oprUsuario;
    }
}
