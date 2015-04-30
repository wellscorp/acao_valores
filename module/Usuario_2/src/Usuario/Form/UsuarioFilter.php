<?php
/**
 * Created by PhpStorm.
 * User: Welton
 * Date: 21/11/2014
 * Time: 18:33
 */

namespace Usuario\Form;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\Validator\InArray;
use Zend\Validator\NotEmpty;

class UsuarioFilter extends InputFilter {

    //FILTRAR CAMPO. EX.: CASO NÃO ACEITE NULO

    protected $cliente;
    protected $vendedor;
    protected $gerente;

    public function __construct(/*Array $cliente = array(),Array $vendedor = array(),Array $gerente = array()*/){

/*
        $this->cliente= $cliente;
        $this->vendedor= $vendedor;
        $this->gerente= $gerente;
*/

        $nome= new Input('nome');
        $nome->setRequired(true)        // TRUE= OBRIGADO A INSERIR
                ->getFilterChain()
                ->attach(new StringTrim())      //REMOVE ESPAÇOS EM BRANCO
                ->attach(new StripTags());
        $nome->getValidatorChain()->attach(new NotEmpty());
        $this->add($nome);

        $senha= new Input('senha');
        $senha->setRequired(true)        // TRUE= OBRIGADO A INSERIR
        ->getFilterChain()
            ->attach(new StringTrim())      //REMOVE ESPAÇOS EM BRANCO
            ->attach(new StripTags());
        $senha->getValidatorChain()->attach(new NotEmpty());
        $this->add($senha);

        $repitaSenha= new Input('senha');
        $repitaSenha->setRequired(true)        // TRUE= OBRIGADO A INSERIR
        ->getFilterChain()
            ->attach(new StringTrim())      //REMOVE ESPAÇOS EM BRANCO
            ->attach(new StripTags());
        $repitaSenha->getValidatorChain()->attach(new NotEmpty());
        $this->add($repitaSenha);

/*

        $inArray= new InArray();
        $inArray->setOptions(array('haystack' => $this->haystack($this->cliente)));

        $cliente= new Input('id_cliente');
        $cliente->setRequired(true)
            ->getFilterChain()->attach(new StripTags())
            ->attach(new StringTrim());
        $cliente->getValidatorChain()->attach($inArray);
        $this->add($cliente);

        $inArray2= new InArray();
        $inArray2->setOptions(array('haystack' => $this->haystack($this->vendedor)));

        $vendedor= new Input('id_vendedir');
        $vendedor->setRequired(true)
            ->getFilterChain()->attach(new StripTags())
            ->attach(new StringTrim());
        $vendedor->getValidatorChain()->attach($inArray);
        $this->add($vendedor);

        $inArray2= new InArray();
        $inArray2->setOptions(array('haystack' => $this->haystack($this->gerente)));

        $gerente= new Input('id_gerente');
        $gerente->setRequired(true)
            ->getFilterChain()->attach(new StripTags())
            ->attach(new StringTrim());
        $gerente->getValidatorChain()->attach($inArray);
        $this->add($gerente);

*/

    }

/*
 * @param array $haystack
 *
 * @return array
 * */
    public function haystack(Array $haystack = array()){
        $array= array();
        foreach($haystack as $value) {
            //if($value)
                $array[$value['value']] = $value['label'];
        }

        return array_keys($array);
    }




} 