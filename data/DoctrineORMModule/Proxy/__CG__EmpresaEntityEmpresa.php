<?php

namespace DoctrineORMModule\Proxy\__CG__\Empresa\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Empresa extends \Empresa\Entity\Empresa implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'Empresa\\Entity\\Empresa' . "\0" . 'id', '' . "\0" . 'Empresa\\Entity\\Empresa' . "\0" . 'nome', '' . "\0" . 'Empresa\\Entity\\Empresa' . "\0" . 'cnpj', '' . "\0" . 'Empresa\\Entity\\Empresa' . "\0" . 'dataCriacao', '' . "\0" . 'Empresa\\Entity\\Empresa' . "\0" . 'horaCriacao', '' . "\0" . 'Empresa\\Entity\\Empresa' . "\0" . 'numero', '' . "\0" . 'Empresa\\Entity\\Empresa' . "\0" . 'bairro', '' . "\0" . 'Empresa\\Entity\\Empresa' . "\0" . 'cidade', '' . "\0" . 'Empresa\\Entity\\Empresa' . "\0" . 'codCidade', '' . "\0" . 'Empresa\\Entity\\Empresa' . "\0" . 'cep', '' . "\0" . 'Empresa\\Entity\\Empresa' . "\0" . 'estado');
        }

        return array('__isInitialized__', '' . "\0" . 'Empresa\\Entity\\Empresa' . "\0" . 'id', '' . "\0" . 'Empresa\\Entity\\Empresa' . "\0" . 'nome', '' . "\0" . 'Empresa\\Entity\\Empresa' . "\0" . 'cnpj', '' . "\0" . 'Empresa\\Entity\\Empresa' . "\0" . 'dataCriacao', '' . "\0" . 'Empresa\\Entity\\Empresa' . "\0" . 'horaCriacao', '' . "\0" . 'Empresa\\Entity\\Empresa' . "\0" . 'numero', '' . "\0" . 'Empresa\\Entity\\Empresa' . "\0" . 'bairro', '' . "\0" . 'Empresa\\Entity\\Empresa' . "\0" . 'cidade', '' . "\0" . 'Empresa\\Entity\\Empresa' . "\0" . 'codCidade', '' . "\0" . 'Empresa\\Entity\\Empresa' . "\0" . 'cep', '' . "\0" . 'Empresa\\Entity\\Empresa' . "\0" . 'estado');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Empresa $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getIdEmpresa()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdEmpresa', array());

        return parent::getIdEmpresa();
    }

    /**
     * {@inheritDoc}
     */
    public function setNome($nome)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNome', array($nome));

        return parent::setNome($nome);
    }

    /**
     * {@inheritDoc}
     */
    public function getNome()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNome', array());

        return parent::getNome();
    }

    /**
     * {@inheritDoc}
     */
    public function setCnpj($cnpj)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCnpj', array($cnpj));

        return parent::setCnpj($cnpj);
    }

    /**
     * {@inheritDoc}
     */
    public function getCnpj()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCnpj', array());

        return parent::getCnpj();
    }

    /**
     * {@inheritDoc}
     */
    public function setDataCriacao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDataCriacao', array());

        return parent::setDataCriacao();
    }

    /**
     * {@inheritDoc}
     */
    public function getDataCriacao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDataCriacao', array());

        return parent::getDataCriacao();
    }

    /**
     * {@inheritDoc}
     */
    public function setHoraCriacao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHoraCriacao', array());

        return parent::setHoraCriacao();
    }

    /**
     * {@inheritDoc}
     */
    public function getHoraCriacao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHoraCriacao', array());

        return parent::getHoraCriacao();
    }

    /**
     * {@inheritDoc}
     */
    public function setNumero($numero)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNumero', array($numero));

        return parent::setNumero($numero);
    }

    /**
     * {@inheritDoc}
     */
    public function getNumero()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNumero', array());

        return parent::getNumero();
    }

    /**
     * {@inheritDoc}
     */
    public function setBairro($bairro)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBairro', array($bairro));

        return parent::setBairro($bairro);
    }

    /**
     * {@inheritDoc}
     */
    public function getBairro()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBairro', array());

        return parent::getBairro();
    }

    /**
     * {@inheritDoc}
     */
    public function setCidade($cidade)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCidade', array($cidade));

        return parent::setCidade($cidade);
    }

    /**
     * {@inheritDoc}
     */
    public function getCidade()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCidade', array());

        return parent::getCidade();
    }

    /**
     * {@inheritDoc}
     */
    public function setCodCidade($codCidade)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCodCidade', array($codCidade));

        return parent::setCodCidade($codCidade);
    }

    /**
     * {@inheritDoc}
     */
    public function getCodCidade()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCodCidade', array());

        return parent::getCodCidade();
    }

    /**
     * {@inheritDoc}
     */
    public function setCep($cep)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCep', array($cep));

        return parent::setCep($cep);
    }

    /**
     * {@inheritDoc}
     */
    public function getCep()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCep', array());

        return parent::getCep();
    }

    /**
     * {@inheritDoc}
     */
    public function setEstado($estado)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEstado', array($estado));

        return parent::setEstado($estado);
    }

    /**
     * {@inheritDoc}
     */
    public function getEstado()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEstado', array());

        return parent::getEstado();
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'toArray', array());

        return parent::toArray();
    }

}
