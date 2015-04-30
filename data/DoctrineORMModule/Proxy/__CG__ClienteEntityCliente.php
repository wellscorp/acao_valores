<?php

namespace DoctrineORMModule\Proxy\__CG__\Cliente\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Cliente extends \Cliente\Entity\Cliente implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'id', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'razaoSocial', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'cnpj', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'inscricaoEstadual', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'inscricaoMunicipal', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'nomeFantasia', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'cep', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'estado', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'cidade', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'endereco', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'bairro', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'tel1', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'tel2', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'tel3', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'observacao', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'email', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'idPais', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'idVendedor', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'dtCriacao', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'latitude', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'longitude', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'numero', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'complemento', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'idStatusCli', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'idEmpresa', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'idUsuario');
        }

        return array('__isInitialized__', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'id', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'razaoSocial', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'cnpj', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'inscricaoEstadual', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'inscricaoMunicipal', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'nomeFantasia', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'cep', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'estado', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'cidade', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'endereco', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'bairro', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'tel1', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'tel2', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'tel3', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'observacao', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'email', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'idPais', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'idVendedor', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'dtCriacao', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'latitude', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'longitude', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'numero', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'complemento', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'idStatusCli', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'idEmpresa', '' . "\0" . 'Cliente\\Entity\\Cliente' . "\0" . 'idUsuario');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Cliente $proxy) {
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
    public function getComplemento()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getComplemento', array());

        return parent::getComplemento();
    }

    /**
     * {@inheritDoc}
     */
    public function setComplemento($complemento)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setComplemento', array($complemento));

        return parent::setComplemento($complemento);
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
    public function setNumero($numero)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNumero', array($numero));

        return parent::setNumero($numero);
    }

    /**
     * {@inheritDoc}
     */
    public function getLatitude()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLatitude', array());

        return parent::getLatitude();
    }

    /**
     * {@inheritDoc}
     */
    public function setLatitude($latitude)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLatitude', array($latitude));

        return parent::setLatitude($latitude);
    }

    /**
     * {@inheritDoc}
     */
    public function getLongitude()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLongitude', array());

        return parent::getLongitude();
    }

    /**
     * {@inheritDoc}
     */
    public function setLongitude($longitude)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLongitude', array($longitude));

        return parent::setLongitude($longitude);
    }

    /**
     * {@inheritDoc}
     */
    public function setIdEmpresa(\Base\Entity\Empresa $idEmpresa = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdEmpresa', array($idEmpresa));

        return parent::setIdEmpresa($idEmpresa);
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
    public function setIdUsuario(\Usuario\Entity\Usuario $idUsuario = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdUsuario', array($idUsuario));

        return parent::setIdUsuario($idUsuario);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdUsuario()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdUsuario', array());

        return parent::getIdUsuario();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdStatusCli(\Base\Entity\StatusCli $idStatusCli = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdStatusCli', array($idStatusCli));

        return parent::setIdStatusCli($idStatusCli);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdStatusCli()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdStatusCli', array());

        return parent::getIdStatusCli();
    }

    /**
     * {@inheritDoc}
     */
    public function setDtCriacao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDtCriacao', array());

        return parent::setDtCriacao();
    }

    /**
     * {@inheritDoc}
     */
    public function getDtCriacao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDtCriacao', array());

        return parent::getDtCriacao();
    }

    /**
     * {@inheritDoc}
     */
    public function getIdCliente()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdCliente', array());

        return parent::getIdCliente();
    }

    /**
     * {@inheritDoc}
     */
    public function setRazaoSocial($razaoSocial)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRazaoSocial', array($razaoSocial));

        return parent::setRazaoSocial($razaoSocial);
    }

    /**
     * {@inheritDoc}
     */
    public function getRazaoSocial()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRazaoSocial', array());

        return parent::getRazaoSocial();
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
    public function setInscricaoEstadual($inscricaoEstadual)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setInscricaoEstadual', array($inscricaoEstadual));

        return parent::setInscricaoEstadual($inscricaoEstadual);
    }

    /**
     * {@inheritDoc}
     */
    public function getInscricaoEstadual()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getInscricaoEstadual', array());

        return parent::getInscricaoEstadual();
    }

    /**
     * {@inheritDoc}
     */
    public function setInscricaoMunicipal($inscricaoMunicipal)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setInscricaoMunicipal', array($inscricaoMunicipal));

        return parent::setInscricaoMunicipal($inscricaoMunicipal);
    }

    /**
     * {@inheritDoc}
     */
    public function getInscricaoMunicipal()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getInscricaoMunicipal', array());

        return parent::getInscricaoMunicipal();
    }

    /**
     * {@inheritDoc}
     */
    public function setNomeFantasia($nomeFantasia)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNomeFantasia', array($nomeFantasia));

        return parent::setNomeFantasia($nomeFantasia);
    }

    /**
     * {@inheritDoc}
     */
    public function getNomeFantasia()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNomeFantasia', array());

        return parent::getNomeFantasia();
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
    public function setEndereco($endereco)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEndereco', array($endereco));

        return parent::setEndereco($endereco);
    }

    /**
     * {@inheritDoc}
     */
    public function getEndereco()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEndereco', array());

        return parent::getEndereco();
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
    public function setTel1($tel1)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTel1', array($tel1));

        return parent::setTel1($tel1);
    }

    /**
     * {@inheritDoc}
     */
    public function getTel1()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTel1', array());

        return parent::getTel1();
    }

    /**
     * {@inheritDoc}
     */
    public function setTel2($tel2)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTel2', array($tel2));

        return parent::setTel2($tel2);
    }

    /**
     * {@inheritDoc}
     */
    public function getTel2()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTel2', array());

        return parent::getTel2();
    }

    /**
     * {@inheritDoc}
     */
    public function setTel3($tel3)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTel3', array($tel3));

        return parent::setTel3($tel3);
    }

    /**
     * {@inheritDoc}
     */
    public function getTel3()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTel3', array());

        return parent::getTel3();
    }

    /**
     * {@inheritDoc}
     */
    public function setObservacao($observacao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setObservacao', array($observacao));

        return parent::setObservacao($observacao);
    }

    /**
     * {@inheritDoc}
     */
    public function getObservacao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getObservacao', array());

        return parent::getObservacao();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail($email)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', array($email));

        return parent::setEmail($email);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', array());

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdPais(\Base\Entity\Pais $idPais = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdPais', array($idPais));

        return parent::setIdPais($idPais);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdPais()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdPais', array());

        return parent::getIdPais();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdVendedor(\Base\Entity\Vendedor $idVendedor = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdVendedor', array($idVendedor));

        return parent::setIdVendedor($idVendedor);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdVendedor()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdVendedor', array());

        return parent::getIdVendedor();
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