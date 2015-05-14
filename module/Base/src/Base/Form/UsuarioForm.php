<?php
/**
 * Created by PhpStorm.
 * User: Welton
 * Date: 21/11/2014
 * Time: 18:21
 */

namespace Base\Form;

use DoctrineModule\Form\Element\ObjectSelect;

use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Zend\Form\Element\Button;
use Zend\Form\Element\Email;
use Zend\Form\Element\Password;
use Zend\Form\Element\Text;
use Zend\Form\Element\Number;
use Zend\Form\Element\Date;
use Zend\Form\Element\Textarea;
use Zend\Form\Form;
use Base\Form\UsuarioFilter;

class UsuarioForm extends Form implements ObjectManagerAwareInterface {


    public function __construct(){


        parent::__construct(null);
        $this->setAttribute('method', 'POST');
        $this->setAttribute('class', 'form-horizontal');



        // INPUT DESCRICAO
        $email= new Text('USR_EMAIL_USUARIO');
        $email->setLabel('E-mail')
            ->setAttributes(array(
                'maxlength' => 50,
                'class' => 'form-control'
            ));
        $this->add($email);

        $nome= new Text('USR_NOME_USUARIO');
        $nome->setLabel('Nome')
            ->setAttributes(array(
                'maxlength' => 50,
                'class' => 'form-control'
            ));
        $this->add($nome);

        $apelido= new Text('apelido_usuario');
        $apelido->setLabel('Apelido')
            ->setAttributes(array(
                'maxlength' => 50,
                'class' => 'form-control'
            ));
        $this->add($apelido);

        $senha= new Password('USR_SENHA');
        $senha->setLabel('Senha')
            ->setAttributes(array(
                'maxlength' => 50,
                'class' => 'form-control'
            ));
        $this->add($senha);


        // BOTAO SUBMIT
        $button= new Button('Submit');
        $button->setLabel('Salvar')
            ->setAttributes(array(
                'type' => 'submit',
                'class' => 'btn btn-success',
                'style' => 'margin-top:10px'
            ));
        $this->add($button);

        $this->setInputFilter(new UsuarioFilter());

    }


    public function setObjectManager(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function getObjectManager()
    {
        return $this->objectManager;
    }

} 