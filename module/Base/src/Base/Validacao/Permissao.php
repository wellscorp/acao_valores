<?php
/**
 * Created by PhpStorm.
 * User: Welton
 * Date: 03/03/2015
 * Time: 11:24
 */

namespace Base\Validacao;


class Permissao {

    public function Empresa($list, $idEmpresa){


        foreach($list as $key => $obj){
            //var_dump($obj->getIdEmpresa()->getId());
            //var_dump(is_object($obj->getIdEmpresa()));
            //$id= $obj->getIdEmpresa()->getId();
            if($obj->getIdEmpresa()){

                if(is_object($obj->getIdEmpresa())){

                    if($obj->getIdEmpresa()->getIdEmpresa() != $idEmpresa){
                        //var_dump('falso');
                        unset($list[$key]);
                    }
                }else{
                    if($obj->getIdEmpresa() != $idEmpresa){
                        //var_dump('falso');
                        unset($list[$key]);
                    }
                }

            }
            
        }
        $list= array_values($list);

        return $list;

    }


    public function tipoUsuario($list, $user){

        //var_dump( $user->getIdGestor()->getIdGestor());die;
/*
        foreach($list as $key => $obj){
            if($obj->getIdCliente()->getIdUsuario()->getIdGestor()->getIdGestor() != $user->getIdGestor()->getIdGestor()){
                unset($list[$key]);
            }
        }
*/

        if($user->getTipo() == 'gestor'){
            foreach($list as $key => $obj){
                if($obj->getIdGestor()->getIdGestor() != $user->getIdGestor()->getIdGestor()){
                    unset($list[$key]);
                }
            }
            $list= array_values($list);
            return $list;
        }

        if($user->getTipo() == 'agente'){
            foreach($list as $key => $obj){
                if($obj->getIdAgente()->getIdAgente() != $user->getIdAgente()->getIdAgente()){
                    unset($list[$key]);
                }
            }
            $list= array_values($list);
            return $list;
        }

        if($user->getTipo() == 'vendedor'){
            foreach($list as $key => $obj){
                if($obj->getIdVendedor()->getIdVendedor() != $user->getIdVendedor()->getIdVendedor()){
                    unset($list[$key]);
                }
            }
            $list= array_values($list);
            return $list;
        }

        if($user->getTipo() == 'cliente'){
            foreach($list as $key => $obj){
                if($obj->getIdCliente()->getIdCliente() != $user->getIdCliente()->getIdCliente()){
                    unset($list[$key]);
                }
            }
            $list= array_values($list);
            return $list;
        }

        if($user->getTipo() == 'tecnico'){
            foreach($list as $key => $obj){
                if($obj->getIdTecnico()->getIdTecnico() != $user->getIdTecnico()->getIdTecnico()){
                    unset($list[$key]);
                }
            }
            $list= array_values($list);
            return $list;
        }

    }



    public function tipoUsuarioPraChamado($list, $user){


        if($user->getTipo() == 'gestor'){
            foreach($list as $key => $obj){
                if($obj->getIdResposta() != null){
                    unset($list[$key]);
                }
                //var_dump($obj->getIdCliente()->getIdUsuario());
                if($obj->getIdCliente()){

                    if($obj->getIdCliente()->getIdUsuario()->getIdGestor()){
                        if($obj->getIdCliente()->getIdUsuario()->getIdGestor()->getIdGestor() != $user->getIdGestor()->getIdGestor()){
                            unset($list[$key]);
                        }
                    }else{
                        unset($list[$key]);
                    }
                }

            }
            $list= array_values($list);
            return $list;
        }

        if($user->getTipo() == 'agente'){
            foreach($list as $key => $obj){
                if($obj->getIdResposta() != null){
                    unset($list[$key]);
                }
                if($obj->getIdCliente()){

                    if($obj->getIdCliente()->getIdUsuario()->getIdAgente()){
                        if($obj->getIdCliente()->getIdUsuario()->getIdAgente()->getIdAgente() != $user->getIdAgente()->getIdAgente()){
                            unset($list[$key]);
                        }
                    }else{
                        unset($list[$key]);
                    }
                }

            }
            $list= array_values($list);
            return $list;
        }

        if($user->getTipo() == 'vendedor'){
            foreach($list as $key => $obj){
                if($obj->getIdResposta() != null){
                    unset($list[$key]);
                }
                if($obj->getIdCliente()){

                    if($obj->getIdCliente()->getIdUsuario()->getIdVendedor()){
                        if($obj->getIdCliente()->getIdUsuario()->getIdVendedor()->getIdVendedor() != $user->getIdVendedor()->getIdVendedor()){
                            unset($list[$key]);
                        }
                    }else{
                        unset($list[$key]);
                    }
                }

            }
            $list= array_values($list);
            return $list;
        }

        if($user->getTipo() == 'cliente'){
            foreach($list as $key => $obj){
                if($obj->getIdResposta() != null){
                    unset($list[$key]);
                }

                if($obj->getIdCliente()){

                    if($obj->getIdCliente()->getIdUsuario()->getIdCliente()){
                        if($obj->getIdCliente()->getIdUsuario()->getIdCliente()->getIdCliente() != $user->getIdCliente()->getIdCliente()){
                            unset($list[$key]);
                        }
                    }else{
                        unset($list[$key]);
                    }
                }

            }
            $list= array_values($list);
            return $list;
        }

        if($user->getTipo() == 'tecnico'){
            foreach($list as $key => $obj){
                if($obj->getIdResposta() != null){
                    unset($list[$key]);
                }

                if($obj->getIdCliente()){

                    if($obj->getIdCliente()->getIdUsuario()->getIdTecnico()){
                        if($obj->getIdCliente()->getIdUsuario()->getIdTecnico()->getIdTecnico() != $user->getIdTecnico()->getIdTecnico()){
                            unset($list[$key]);
                        }
                    }else{
                        unset($list[$key]);
                    }
                }

            }
            $list= array_values($list);
            return $list;
        }


        return $list;

    }





    public function tipoUsuarioPraCliente($list, $user){


        if($user->getTipo() == 'gestor'){
            foreach($list as $key => $obj){
                if($obj->getIdUsuario()->getIdGestor()){
                    if($obj->getIdUsuario()->getIdGestor()->getIdGestor() != $user->getIdGestor()->getIdGestor()){
                        unset($list[$key]);
                    }
                }else{
                    unset($list[$key]);
                }

            }
            $list= array_values($list);
            return $list;
        }

        if($user->getTipo() == 'agente'){
            foreach($list as $key => $obj){
                //var_dump($obj);
                if($obj->getIdUsuario()->getIdAgente()){
                    if($obj->getIdUsuario()->getIdAgente()->getIdAgente() != $user->getIdAgente()->getIdAgente()){
                        unset($list[$key]);
                    }
                }else{
                    unset($list[$key]);
                }

            }
            $list= array_values($list);
            return $list;
        }

        if($user->getTipo() == 'vendedor'){
            foreach($list as $key => $obj){
                if($obj->getIdUsuario()->getIdVendedor()){
                    if($obj->getIdUsuario()->getIdVendedor()->getIdVendedor() != $user->getIdVendedor()->getIdVendedor()){
                        unset($list[$key]);
                    }
                }else{
                    unset($list[$key]);
                }

            }
            $list= array_values($list);
            return $list;
        }

        if($user->getTipo() == 'cliente'){
            foreach($list as $key => $obj){
                if($obj->getIdUsuario()->getIdCliente()){
                    if($obj->getIdUsuario()->getIdCliente()->getIdCliente() != $user->getIdCliente()->getIdCliente()){
                        unset($list[$key]);
                    }
                }else{
                    unset($list[$key]);
                }

            }
            $list= array_values($list);
            return $list;
        }

        if($user->getTipo() == 'tecnico'){
            foreach($list as $key => $obj){
                if($obj->getIdUsuario()->getIdTecnico()){
                    if($obj->getIdUsuario()->getIdTecnico()->getIdTecnico() != $user->getIdTecnico()->getIdTecnico()){
                        unset($list[$key]);
                    }
                }else{
                    unset($list[$key]);
                }

            }
            $list= array_values($list);
            return $list;
        }

        return $list;

    }



} 