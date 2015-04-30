<?php

namespace Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AcoAcao
 *
 * @ORM\Table(name="ACO_ACAO")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Base\Repository\AcoAcaoRepository")
 */
class AcoAcao extends AbstractEntity
{
    /**
     * @var string
     *
     * @ORM\Column(name="ACO_ID_ACAO", type="decimal", precision=18, scale=0, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $acoIdAcao;

    /**
     * @var string
     *
     * @ORM\Column(name="ACO_CODIGO_ACAO", type="string", length=50, nullable=false)
     */
    private $acoCodigoAcao;

    /**
     * @var string
     *
     * @ORM\Column(name="ACO_NOME_ACAO", type="string", length=50, nullable=false)
     */
    private $acoNomeAcao;

    /**
     * @var string
     *
     * @ORM\Column(name="ACO_RAMO_ACAO", type="string", length=50, nullable=false)
     */
    private $acoRamoAcao;

    /**
     * @var float
     *
     * @ORM\Column(name="ACO_VALOR_MAXIMO", type="float", precision=53, scale=0, nullable=false)
     */
    private $acoValorMaximo;

    /**
     * @var float
     *
     * @ORM\Column(name="ACO_VALOR_MINIMO", type="float", precision=53, scale=0, nullable=false)
     */
    private $acoValorMinimo;

    /**
     * @var float
     *
     * @ORM\Column(name="ACO_VALOR_ATUAL", type="float", precision=53, scale=0, nullable=false)
     */
    private $acoValorAtual;



    /**
     * Get acoIdAcao
     *
     * @return string
     */
    public function getAcoIdAcao()
    {
        return $this->acoIdAcao;
    }

    /**
     * Set acoCodigoAcao
     *
     * @param string $acoCodigoAcao
     *
     * @return AcoAcao
     */
    public function setAcoCodigoAcao($acoCodigoAcao)
    {
        $this->acoCodigoAcao = $acoCodigoAcao;
    
        return $this;
    }

    /**
     * Get acoCodigoAcao
     *
     * @return string
     */
    public function getAcoCodigoAcao()
    {
        return $this->acoCodigoAcao;
    }

    /**
     * Set acoNomeAcao
     *
     * @param string $acoNomeAcao
     *
     * @return AcoAcao
     */
    public function setAcoNomeAcao($acoNomeAcao)
    {
        $this->acoNomeAcao = $acoNomeAcao;
    
        return $this;
    }

    /**
     * Get acoNomeAcao
     *
     * @return string
     */
    public function getAcoNomeAcao()
    {
        return $this->acoNomeAcao;
    }

    /**
     * Set acoRamoAcao
     *
     * @param string $acoRamoAcao
     *
     * @return AcoAcao
     */
    public function setAcoRamoAcao($acoRamoAcao)
    {
        $this->acoRamoAcao = $acoRamoAcao;
    
        return $this;
    }

    /**
     * Get acoRamoAcao
     *
     * @return string
     */
    public function getAcoRamoAcao()
    {
        return $this->acoRamoAcao;
    }

    /**
     * Set acoValorMaximo
     *
     * @param float $acoValorMaximo
     *
     * @return AcoAcao
     */
    public function setAcoValorMaximo($acoValorMaximo)
    {
        $this->acoValorMaximo = $acoValorMaximo;
    
        return $this;
    }

    /**
     * Get acoValorMaximo
     *
     * @return float
     */
    public function getAcoValorMaximo()
    {
        return $this->acoValorMaximo;
    }

    /**
     * Set acoValorMinimo
     *
     * @param float $acoValorMinimo
     *
     * @return AcoAcao
     */
    public function setAcoValorMinimo($acoValorMinimo)
    {
        $this->acoValorMinimo = $acoValorMinimo;
    
        return $this;
    }

    /**
     * Get acoValorMinimo
     *
     * @return float
     */
    public function getAcoValorMinimo()
    {
        return $this->acoValorMinimo;
    }

    /**
     * Set acoValorAtual
     *
     * @param float $acoValorAtual
     *
     * @return AcoAcao
     */
    public function setAcoValorAtual($acoValorAtual)
    {
        $this->acoValorAtual = $acoValorAtual;
    
        return $this;
    }

    /**
     * Get acoValorAtual
     *
     * @return float
     */
    public function getAcoValorAtual()
    {
        return $this->acoValorAtual;
    }
}
