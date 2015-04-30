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

class LoginFilter extends InputFilter {

    //FILTRAR CAMPO. EX.: CASO NÃO ACEITE NULO


    public function __construct(){



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