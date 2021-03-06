<?php

namespace DoctrineORMModule\Proxy\__CG__\Pessoa\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Pessoa extends \Pessoa\Entity\Pessoa implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'id', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'nomepessoa', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'endereco', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'cidade', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'bairro', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'numero', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'complemento', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'cep', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'telefone', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'celular', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'email', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'dataNascimento', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'profissao', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'assunto', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'data', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'cpf', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'assessor', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'dataLog');
        }

        return array('__isInitialized__', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'id', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'nomepessoa', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'endereco', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'cidade', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'bairro', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'numero', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'complemento', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'cep', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'telefone', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'celular', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'email', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'dataNascimento', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'profissao', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'assunto', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'data', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'cpf', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'assessor', '' . "\0" . 'Pessoa\\Entity\\Pessoa' . "\0" . 'dataLog');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Pessoa $proxy) {
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
    public function getIdPessoa()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdPessoa', array());

        return parent::getIdPessoa();
    }

    /**
     * {@inheritDoc}
     */
    public function setNomePessoa($nomePessoa)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNomePessoa', array($nomePessoa));

        return parent::setNomePessoa($nomePessoa);
    }

    /**
     * {@inheritDoc}
     */
    public function getNomePessoa()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNomePessoa', array());

        return parent::getNomePessoa();
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
    public function setComplemento($complemento)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setComplemento', array($complemento));

        return parent::setComplemento($complemento);
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
    public function setTelefone($telefone)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTelefone', array($telefone));

        return parent::setTelefone($telefone);
    }

    /**
     * {@inheritDoc}
     */
    public function getTelefone()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTelefone', array());

        return parent::getTelefone();
    }

    /**
     * {@inheritDoc}
     */
    public function setCelular($celular)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCelular', array($celular));

        return parent::setCelular($celular);
    }

    /**
     * {@inheritDoc}
     */
    public function getCelular()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCelular', array());

        return parent::getCelular();
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
    public function setDataNascimento($dataNascimento)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDataNascimento', array($dataNascimento));

        return parent::setDataNascimento($dataNascimento);
    }

    /**
     * {@inheritDoc}
     */
    public function getDataNascimento()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDataNascimento', array());

        return parent::getDataNascimento();
    }

    /**
     * {@inheritDoc}
     */
    public function setProfissao($profissao)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProfissao', array($profissao));

        return parent::setProfissao($profissao);
    }

    /**
     * {@inheritDoc}
     */
    public function getProfissao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProfissao', array());

        return parent::getProfissao();
    }

    /**
     * {@inheritDoc}
     */
    public function setAssunto($assunto)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAssunto', array($assunto));

        return parent::setAssunto($assunto);
    }

    /**
     * {@inheritDoc}
     */
    public function getAssunto()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAssunto', array());

        return parent::getAssunto();
    }

    /**
     * {@inheritDoc}
     */
    public function setData($data)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setData', array($data));

        return parent::setData($data);
    }

    /**
     * {@inheritDoc}
     */
    public function getData()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getData', array());

        return parent::getData();
    }

    /**
     * {@inheritDoc}
     */
    public function setCpf($cpf)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCpf', array($cpf));

        return parent::setCpf($cpf);
    }

    /**
     * {@inheritDoc}
     */
    public function getCpf()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCpf', array());

        return parent::getCpf();
    }

    /**
     * {@inheritDoc}
     */
    public function setAssessor($assessor)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAssessor', array($assessor));

        return parent::setAssessor($assessor);
    }

    /**
     * {@inheritDoc}
     */
    public function getAssessor()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAssessor', array());

        return parent::getAssessor();
    }

    /**
     * {@inheritDoc}
     */
    public function setDataLog($dataLog)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDataLog', array($dataLog));

        return parent::setDataLog($dataLog);
    }

    /**
     * {@inheritDoc}
     */
    public function getDataLog()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDataLog', array());

        return parent::getDataLog();
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
