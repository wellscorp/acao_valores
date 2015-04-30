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
use Usuario\Form\UsuarioFilter;

class UsuarioForm extends Form implements ObjectManagerAwareInterface {


    public function __construct(/*ObjectManager $objectManager*/){


        //$this->setObjectManager($objectManager);

        parent::__construct(null);
        $this->setAttribute('method', 'POST');
        $this->setAttribute('class', 'form-horizontal');



        // INPUT DESCRICAO
        $nome= new Text('nome');
        $nome->setLabel('Nome')
            ->setAttributes(array(
                'maxlength' => 80,
                'class' => 'form-control'
            ));
        $this->add($nome);

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

        /*
        $tipo= new Select('tipo');
        $tipo->setLabel('Tipo de usuário')
                ->setValueOptions(array(
                    '0' => '--Selecione--',
                    '1' => 'Gerente',
                    '2' => 'Vendedor',
                    '3' => 'Cliente'
                ))
                ->setAttributes(array(
                    'class' => 'form-control',
                    'id'    => 'tipo',
                    'onmousedown' => 'selecioneTipo()'
                ));
        $this->add($tipo);




        $cliente= new ObjectSelect('id_cliente');
        $cliente->setLabel('Cliente')
            ->setAttributes(array(
                'style' => 'display:block',
                'class' => 'form-control',
                'id'    => 'cliente'
            ))
            ->setOptions(array(
                'object_manager' => $this->getObjectManager(),
                'target_class'   => 'Cliente\Entity\Cliente',
                'property'       => 'nome',
                'empty_option' => '--Selecione--',
                'is_method'      => true,
                'find_method'    => array(
                    'name'   => 'findBy',
                    'params' => array(
                        'criteria' => array(),

                        // Use key 'orderBy' if using ORM
                        'orderBy'  => array('nome' => 'ASC'),

                        // Use key 'sort' if using ODM
                        'sort'  => array('nome' => 'ASC')
                    ),
                ),
            ));
        $this->add($cliente);


        $vendedor= new ObjectSelect('id_vendedor');
        $vendedor->setLabel('Vendedor')
            ->setAttributes(array(
                'style' => 'display:block',
                'class' => 'form-control',
                'id'    => 'vendedor'
            ))
            ->setOptions(array(
                'object_manager' => $this->getObjectManager(),
                'target_class'   => 'Vendedor\Entity\Vendedor',
                'property'       => 'nome',
                'empty_option' => '--Selecione--',
                'is_method'      => true,
                'find_method'    => array(
                    'name'   => 'findBy',
                    'params' => array(
                        'criteria' => array(),

                        // Use key 'orderBy' if using ORM
                        'orderBy'  => array('nome' => 'ASC'),

                        // Use key 'sort' if using ODM
                        'sort'  => array('nome' => 'ASC')
                    ),
                ),
            ));
        $this->add($vendedor);


        $gerente= new ObjectSelect('id_gerente');
        $gerente->setLabel('Gerente')
            ->setAttributes(array(
                'style' => 'display:block',
                'class' => 'form-control',
                'id'    => 'gerente'
            ))
            ->setOptions(array(
                'object_manager' => $this->getObjectManager(),
                'target_class'   => 'Gerente\Entity\Gerente',
                'property'       => 'nome',
                'empty_option' => '--Selecione--',
                'is_method'      => true,
                'find_method'    => array(
                    'name'   => 'findBy',
                    'params' => array(
                        'criteria' => array(),

                        // Use key 'orderBy' if using ORM
                        'orderBy'  => array('nome' => 'ASC'),

                        // Use key 'sort' if using ODM
                        'sort'  => array('nome' => 'ASC')
                    ),
                ),
            ));
        $this->add($gerente);

*/



        // BOTAO SUBMIT
        $button= new Button('Submit');
        $button->setLabel('Salvar')
            ->setAttributes(array(
                'type' => 'submit',
                'class' => 'btn btn-success',
                'style' => 'margin-top:10px'
            ));
        $this->add($button);

        $this->setInputFilter( new UsuarioFilter()/*new UsuarioFilter($cliente->getValueOptions()),new UsuarioFilter($vendedor->getValueOptions()),new UsuarioFilter($gerente->getValueOptions())*/);

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