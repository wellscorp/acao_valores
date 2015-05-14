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
use Base\Form\AcaoFilter;

class AcaoForm extends Form implements ObjectManagerAwareInterface {


    public function __construct(){


        parent::__construct(null);
        $this->setAttribute('method', 'POST');
        $this->setAttribute('class', 'form-horizontal');



        // INPUT DESCRICAO
        $cod= new Text('ACO_CODIGO_ACAO');
        $cod->setLabel('Codigo da Ação')
            ->setAttributes(array(
                'maxlength' => 50,
                'class' => 'form-control'
            ));
        $this->add($cod);

        $nome= new Text('ACO_NOME_ACAO');
        $nome->setLabel('Nome')
            ->setAttributes(array(
                'maxlength' => 50,
                'class' => 'form-control'
            ));
        $this->add($nome);

        $ramo= new Text('ACO_RAMO_ACAO');
        $ramo->setLabel('Ramo')
            ->setAttributes(array(
                'maxlength' => 50,
                'class' => 'form-control'
            ));
        $this->add($ramo);

        $max= new Text('ACO_VALOR_MAXIMO');
        $max->setLabel('Valor Maximo')
            ->setAttributes(array(
                'maxlength' => 53,
                'class' => 'form-control'
            ));
        $this->add($max);

        $min= new Text('ACO_VALOR_MINIMO');
        $min->setLabel('Valor Minimo')
            ->setAttributes(array(
                'maxlength' => 53,
                'class' => 'form-control'
            ));
        $this->add($min);

        $atual= new Text('ACO_VALOR_ATUAL');
        $atual->setLabel('Valor Atual')
            ->setAttributes(array(
                'maxlength' => 53,
                'class' => 'form-control'
            ));
        $this->add($atual);


        // BOTAO SUBMIT
        $button= new Button('Submit');
        $button->setLabel('Salvar')
            ->setAttributes(array(
                'type' => 'submit',
                'class' => 'btn btn-success',
                'style' => 'margin-top:10px'
            ));
        $this->add($button);

        $this->setInputFilter(new AcaoFilter());

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