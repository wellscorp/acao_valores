<?php

namespace DoctrineORMModule\Proxy\__CG__\usuario\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Usuario extends \usuario\Entity\Usuario implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'usuario\\Entity\\Usuario' . "\0" . 'id', '' . "\0" . 'usuario\\Entity\\Usuario' . "\0" . 'nome', '' . "\0" . 'usuario\\Entity\\Usuario' . "\0" . 'email', '' . "\0" . 'usuario\\Entity\\Usuario' . "\0" . 'senha', '' . "\0" . 'usuario\\Entity\\Usuario' . "\0" . 'status', '' . "\0" . 'usuario\\Entity\\Usuario' . "\0" . 'dtCriacao', '' . "\0" . 'usuario\\Entity\\Usuario' . "\0" . 'hrCriacao', '' . "\0" . 'usuario\\Entity\\Usuario' . "\0" . 'dtLogin', '' . "\0" . 'usuario\\Entity\\Usuario' . "\0" . 'hrLogin', '' . "\0" . 'usuario\\Entity\\Usuario' . "\0" . 'idTipoUsuario', '' . "\0" . 'usuario\\Entity\\Usuario' . "\0" . 'idGrupo');
        }

        return array('__isInitialized__', '' . "\0" . 'usuario\\Entity\\Usuario' . "\0" . 'id', '' . "\0" . 'usuario\\Entity\\Usuario' . "\0" . 'nome', '' . "\0" . 'usuario\\Entity\\Usuario' . "\0" . 'email', '' . "\0" . 'usuario\\Entity\\Usuario' . "\0" . 'senha', '' . "\0" . 'usuario\\Entity\\Usuario' . "\0" . 'status', '' . "\0" . 'usuario\\Entity\\Usuario' . "\0" . 'dtCriacao', '' . "\0" . 'usuario\\Entity\\Usuario' . "\0" . 'hrCriacao', '' . "\0" . 'usuario\\Entity\\Usuario' . "\0" . 'dtLogin', '' . "\0" . 'usuario\\Entity\\Usuario' . "\0" . 'hrLogin', '' . "\0" . 'usuario\\Entity\\Usuario' . "\0" . 'idTipoUsuario', '' . "\0" . 'usuario\\Entity\\Usuario' . "\0" . 'idGrupo');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Usuario $proxy) {
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
    public function getIdUsuario()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdUsuario', array());

        return parent::getIdUsuario();
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
    public function setSenha($senha)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSenha', array($senha));

        return parent::setSenha($senha);
    }

    /**
     * {@inheritDoc}
     */
    public function getSenha()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSenha', array());

        return parent::getSenha();
    }

    /**
     * {@inheritDoc}
     */
    public function setStatus($status)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatus', array($status));

        return parent::setStatus($status);
    }

    /**
     * {@inheritDoc}
     */
    public function getStatus()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatus', array());

        return parent::getStatus();
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
    public function setHrCriacao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHrCriacao', array());

        return parent::setHrCriacao();
    }

    /**
     * {@inheritDoc}
     */
    public function getHrCriacao()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHrCriacao', array());

        return parent::getHrCriacao();
    }

    /**
     * {@inheritDoc}
     */
    public function setDtLogin($dtLogin)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDtLogin', array($dtLogin));

        return parent::setDtLogin($dtLogin);
    }

    /**
     * {@inheritDoc}
     */
    public function getDtLogin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDtLogin', array());

        return parent::getDtLogin();
    }

    /**
     * {@inheritDoc}
     */
    public function setHrLogin($hrLogin)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHrLogin', array($hrLogin));

        return parent::setHrLogin($hrLogin);
    }

    /**
     * {@inheritDoc}
     */
    public function getHrLogin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHrLogin', array());

        return parent::getHrLogin();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdTipoUsuario(\grupo\Entity\TipoUsuario $idTipoUsuario = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdTipoUsuario', array($idTipoUsuario));

        return parent::setIdTipoUsuario($idTipoUsuario);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdTipoUsuario()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdTipoUsuario', array());

        return parent::getIdTipoUsuario();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdGrupo(\grupo\Entity\Grupo $idGrupo = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdGrupo', array($idGrupo));

        return parent::setIdGrupo($idGrupo);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdGrupo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdGrupo', array());

        return parent::getIdGrupo();
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