<?php
/**
 * Created by PhpStorm.
 * User: Welton
 * Date: 21/11/2014
 * Time: 18:21
 */

namespace Usuario\Form;

use DoctrineModule\Form\Element\ObjectSelect;

use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Zend\Form\Element\Button;
use Zend\Form\Element\Email;
use Zend\Form\Element\Password;
use Zend\Form\Element\Select;
use Zend\Form\Element\Text;
use Zend\Form\Element\Number;
use Zend\Form\Element\Date;
use Zend\Form\Element\Textarea;
use Zend\Form\Form;
use Usuario\Form\MudarSenhaFilter;

class MudarSenhaForm extends Form implements ObjectManagerAwareInterface {


    public function __construct(){


        parent::__construct(null);
        $this->setAttribute('method', 'POST');
        $this->setAttribute('class', 'form-horizontal');




        $senhaAtual= new Password('senha_atual');
        $senhaAtual->setLabel('Senha Atual')
            ->setAttributes(array(
                'maxlength' => 30,
                'class' => 'form-control'
            ));
        $this->add($senhaAtual);

        $senha= new Password('senha');
        $senha->setLabel('Senha')
            ->setAttributes(array(
                'maxlength' => 30,
                'class' => 'form-control'
            ));
        $this->add($senha);

        $repitaSenha= new Password('repita_senha');
        $repitaSenha->setLabel('Repita a Senha')
            ->setAttributes(array(
                'maxlength' => 30,
                'class' => 'form-control'
            ));
        $this->add($repitaSenha);




        // BOTAO SUBMIT
        $button= new Button('Submit');
        $button->setLabel('Salvar')
            ->setAttributes(array(
                'type' => 'submit',
                'class' => 'btn btn-success',
                'style' => 'margin-top:10px'
            ));
        $this->add($button);

        $this->setInputFilter(new MudarSenhaFilter());

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