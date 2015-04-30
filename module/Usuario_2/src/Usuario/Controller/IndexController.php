<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Usuario\Controller;

session_start();

use Base\Controller\AbstractController;
use Base\Entity\Gestor;
use Usuario\Entity\Usuario;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;
use Base\Validacao\Permissao;

class IndexController extends AbstractController
{

    /**
     *
     */



    protected $nomePessoa;
    protected $pesquisa;

    function __construct()
    {

        $this->form= 'Usuario\Form\LoginForm';
        $this->controller= 'Usuario';
        $this->route= 'Usuario';
        $this->service= 'Usuario\Service\UsuarioService';
        $this->entity= 'Usuario\Entity\Usuario';
        $this->itensPorPagina= 8;

        //$this->formAssessor= 'Assessor\Form\AssessorForm';


    }


    public function excluirAction(){

        return parent::excluirAction();
    }


    public function loginAction(){

        $form= $this->getServiceLocator()->get($this->form);
        $video= $this->getEm()->getRepository('Anexo\Entity\Treinamento')->findAll();

        if($this->getRequest()->isPost()){

            $form->setData($this->getRequest()->getPost()->toArray());

            if($form->isValid()){
                $data= $form->getData();

                /**
                 * @var $auth \Zend\Authentication\AuthenticationService
                 * @var $adapter \Auth\Authentication\Adapter
                 */
                $auth= $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');

                $adapter= $auth->getAdapter();
                $adapter->setNome($data['nome']);
                $adapter->setSenha($data['senha']);

                if($auth->authenticate()->isValid()){



                    //if($this->identity()[0]->getIdEmpresa()->getStatus() == 1){
                        //var_dump($this->identity()[0]->getAtivo());die;
                        $repository= $this->getEm()->getRepository($this->entity)->find($this->identity()[0]->getIdUsuario());

                        $array= array();
                        foreach($repository->toArray() as $key => $value){
                            if($value instanceof \DateTime)
                                $array[$key]= $value->format('d/m/Y');
                            else
                                $array[$key]= $value;
                        }

                        //var_dump($array);die;
                        $array['id']= $array['id_usuario'];
                        $array['dt_login']= date('Y').date('m').date('d');
                        if(strlen(date('i'))==1)
                            $array['hr_login']= date('H').'0'.date('i');
                        else
                            $array['hr_login']= date('H').date('i');
                        //var_dump(date('i'));die;

                        $service= $this->getServiceLocator()->get($this->service);
                        $service->save($array);
                        //var_dump($array);die;

                        $this->tipo= $this->identity()[0];
                        $_SESSION['identity']= $this->identity()[0];

                        return $this->redirect()->toRoute('Base', array('controller' => 'Base', 'action' => 'index'));
                    //}

                        //$this->flashMessenger()->addErrorMessage('Empresa não ativa!');
                        //$mensagem= 'Empresa não ativa!';



                }

                $mensagem= $auth->authenticate()->getMessages();
                $this->flashMessenger()->addErrorMessage($mensagem[0]);
                //echo var_dump($mensagem);die;
                return new ViewModel(array(
                    'form' => $form,
                    'error' => $mensagem
                ));
            }

        }

        return new ViewModel(array('form' => $form, 'data' => $video));
    }



    public function logoutAction(){

        /**
         * @var $auth \Zend\Authentication\AuthenticationService
         */

        $repository= $this->getEm()->getRepository($this->entity)->find($this->identity()[0]->getIdUsuario());

        $array= array();
        foreach($repository->toArray() as $key => $value){
            if($value instanceof \DateTime)
                $array[$key]= $value->format('d/m/Y');
            else
                $array[$key]= $value;
        }
        $array['id']= $array['id_usuario'];
        $array['dt_logout']= date('Y').date('m').date('d');
        if(strlen(date('i'))==1)
            $array['hr_logout']= date('H').'0'.date('i');
        else
            $array['hr_logout']= date('H').date('i');
        //var_dump(date('i'));die;

        $service= $this->getServiceLocator()->get($this->service);
        $service->save($array);

        $auth= $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
        $auth->clearIdentity();
        return $this->redirect()->toRoute('Usuario', array('controller' => 'Usuario', 'action' => 'login'));

    }



    public function mudarAction(){

        if(is_string($this->form)){
            $form= new $this->form;
        }else{
            $form= $this->form;
        }
        $request= $this->getRequest();
        $param= $this->params()->fromRoute('id', 0);

        // BUSCA O REPOSITORIO PASSANDO POR PARAMETRO O ID, RETORNANDO APANAS 1 REGISTRO
        $repository= $this->getEm()->getRepository($this->entity)->find($param);

        if($repository){

            // CASO HAJA REGISTRO DO TIPO DATA, CONVERTE-SE PARA TIPO DATA
            $array= array();
            foreach($repository->toArray() as $key => $value){
                if($value instanceof \DateTime)
                    $array[$key]= $value->format('d/m/Y');
                else
                    $array[$key]= $value;
            }

            $form->setData($array);

            if($request->isPost()){
                //echo var_dump($request->isPost());die;

                $form->setData($request->getPost());

                $service= $this->getServiceLocator()->get($this->service);

                // OBTEM O ID DO ITEM A SER EDITADO
                $data= $request->getPost()->toArray();
                $data['id']= (int) $param;
                if($data['senha'] == $data['senha_2']){
                    //var_dump(md5($data['senha']) == $repository->getSenha());die;
                    if(md5($data['senha_atual']) == $repository->getSenha()) {
                        // TRANSFORMA EM UMA ARRAY
                        $data['senha']= md5($data['senha']);
                        if ($service->save($data)) {
                            //echo "Salvo"; exit;
                            $this->flashMessenger()->addSuccessMessage('Senha alterada com sucesso!');
                        } else {
                            $this->flashMessenger()->addErrorMessage('Não foi possivel alterar senha!');
                        }
                    } else{
                        $this->flashMessenger()->addInfoMessage('Senha digitar incorreta!');
                        return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => 'mudar', 'id' => $param));
                    }
                }else{
                    $this->flashMessenger()->addInfoMessage('As senhas digitas não correspondem!');
                    return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
                }


                // RETORNA PARA A PAGINA ANTERIOR
                return $this->redirect()
                    ->toRoute($this->route, array('controller' => $this->controller, 'action' => 'mudar', 'id' => $param));

            }


        }else{

            $this->flashMessenger()->addInfoMessage('Registro não foi encontrado!');
            return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
        }


        if($this->flashMessenger()->hasSuccessMessages()){
            return new ViewModel(array(
                'form' => $form,
                'success' => $this->flashMessenger()->getSuccessMessages(),
                'id' => $param,
                'data' => $array
            ));
        }

        if($this->flashMessenger()->hasErrorMessages()){
            return new ViewModel(array(
                'form' => $form,
                'error' => $this->flashMessenger()->getErrorMessages(),
                'id' => $param,
                'data' => $array
            ));
        }

        if($this->flashMessenger()->hasInfoMessages()){
            return new ViewModel(array(
                'form' => $form,
                'warning' => $this->flashMessenger()->getInfoMessages(),
                'id' => $param,
                'data' => $array
            ));
        }

        $this->flashMessenger()->clearMessages();

        return new ViewModel(array('form' => $form, 'id' => $param, 'data' => $array));

    }

    public function indexAction(){

        /**
         * @var $auth \Zend\Authentication\AuthenticationService
         */


        //var_dump($this);

        $list= $this->getEm()->getRepository($this->entity)->findAll();

        //var_dump($list[0]->getIdEmpresa()->getId());
        $sessao= serialize($this->identity()[0]);
        $sessao= unserialize($sessao);
        $permissao= new Permissao();
        $list= $permissao->Empresa($list, $sessao->getIdEmpresa()->getIdEmpresa());

        //var_dump(unserialize($_SESSION['chamados']));
        if($this->getRequest()->isPost()){
            $data= $this->getRequest()->getPost()->toArray();
            var_dump($data);

            $array= array();
            foreach($list as $key => $value){
                if($value instanceof \DateTime)
                    $array[$key]= $value->format('d/m/Y');
                else
                    $array[$key]= $value;
            }
            //var_dump($array);

            if(isset($data['limpar'])){
                $list= $this->getEm()->getRepository($this->entity)->findAll();
                $_SESSION['usuario']= serialize($list);
                //$_SESSION['chamados']= $list;
            }else{
                if(isset($_SESSION['usuario']))
                    $list= unserialize($_SESSION['usuario']);
                //$list= $_SESSION['chamados'];
                foreach($list as $entity => $value){

                    if($data['tipo'] == 'nome'){
                        $pos= strpos($value->getNome(),$data['filtro']);
                        if($pos === false)
                            unset($list[$entity]);
                    }
                    if($data['tipo'] == 'email'){
                        $pos= strpos($value->getEmail(),$data['filtro']);
                        if($pos === false)
                            unset($list[$entity]);
                    }

                    $pos= strpos($value->getTipo(),$data['status']);
                    if($pos === false)
                        unset($list[$entity]);


                    $list= array_values($list);
                }
            }

            $_SESSION['usuario']= serialize($list);

            // O RESULTADO QUE CONTEM NA PAGINA SELECIONADA
            $paginator= new Paginator(new ArrayAdapter($list));
            // PASSA O NUMERO ATUAL DA PAGINA
            $page= $this->params()->fromRoute('page');
            // O NUMERO DA PAGINA QUAL SE ESTA
            $paginator->setCurrentPageNumber($page)
                // QUANTIDADE DE ITENS QUE HAVERAM EM CADA PAGINA
                ->setDefaultItemCountPerPage($this->itensPorPagina);

            return new ViewModel(array(
                'data' => $paginator, 'page' => $page
            ));
        }

        $_SESSION['usuario']= serialize($list);
        //$_SESSION['chamados']= $list;
        //var_dump(unserialize($_SESSION['chamados']));

        // -------------------- PADRAO ---------------------
        //$list= $this->getEm()->getRepository($this->entity)->findAll();
        //echo var_dump($list);die;


        // O RESULTADO QUE CONTEM NA PAGINA SELECIONADA
        $paginator= new Paginator(new ArrayAdapter($list));
        // PASSA O NUMERO ATUAL DA PAGINA
        $page= $this->params()->fromRoute('page');
        // O NUMERO DA PAGINA QUAL SE ESTA
        $paginator->setCurrentPageNumber($page)
            // QUANTIDADE DE ITENS QUE HAVERAM EM CADA PAGINA
            ->setDefaultItemCountPerPage($this->itensPorPagina);

        //var_dump($list[0]->getIdPedido());die;
        //$paginator->setFilter($list[0]->getIdPedido());


        if($this->flashMessenger()->hasSuccessMessages()){
            return new ViewModel(array(
                'data' => $paginator,
                'page' => $page,
                'success' => $this->flashMessenger()->getSuccessMessages()
            ));
        }
        if($this->flashMessenger()->hasErrorMessages()){
            return new ViewModel(array(
                'data' => $paginator,
                'page' => $page,
                'error' => $this->flashMessenger()->getErrorMessages()
            ));
        }

        // O ViewModel FAZ A LIGAÇÃO DO CONTROLER COM A VIEW
        return new ViewModel(array(
            'data' => $paginator, 'page' => $page
        ));
    }



    public function mostrarAction(){

        $request= $this->getRequest();
        $param= $this->params()->fromRoute('id', 0);

        // BUSCA O REPOSITORIO PASSANDO POR PARAMETRO O ID, RETORNANDO APANAS 1 REGISTRO
        $repository= $this->getEm()->getRepository($this->entity)->find($param);

        //echo var_dump($this->identity()[0]->getIdVendedor());die;

        if($repository) {

            // CASO HAJA REGISTRO DO TIPO DATA, CONVERTE-SE PARA TIPO DATA
            $array = array();
            foreach ($repository->toArray() as $key => $value) {
                if ($value instanceof \DateTime)
                    $array[$key] = $value->format('d/m/Y');
                else
                    $array[$key] = $value;
            }

        }
        //echo var_dump($array['id_pessoa']);

        //return new JsonModel(array('data' => $array));
        return new ViewModel();


    }




    public function editarAction(){


        if(is_string($this->form)){
            $form= new $this->form;
        }else{
            $form= $this->form;
        }
        $request= $this->getRequest();
        $param= $this->params()->fromRoute('id', 0);

        // BUSCA O REPOSITORIO PASSANDO POR PARAMETRO O ID, RETORNANDO APANAS 1 REGISTRO
        $repository= $this->getEm()->getRepository($this->entity)->find($param);

        if($repository){

            // CASO HAJA REGISTRO DO TIPO DATA, CONVERTE-SE PARA TIPO DATA
            $array= array();
            foreach($repository->toArray() as $key => $value){
                if($value instanceof \DateTime)
                    $array[$key]= $value->format('d/m/Y');
                else
                    $array[$key]= $value;
            }

            if($request->isPost()){

                $service= $this->getServiceLocator()->get($this->service);
                $permissaoService= $this->getServiceLocator()->get('Usuario\Service\PermissaoService');


                // OBTEM O ID DO ITEM A SER EDITADO
                $data= $request->getPost()->toArray();


                if(!isset($data['in_cl']))
                    $data['in_cl']= 0;
                if(!isset($data['in_eq']))
                    $data['in_eq']= 0;
                if(!isset($data['in_co']))
                    $data['in_co']= 0;
                if(!isset($data['in_ar']))
                    $data['in_ar']= 0;
                if(!isset($data['in_op']))
                    $data['in_op']= 0;
                if(!isset($data['in_ev']))
                    $data['in_ev']= 0;
                if(!isset($data['in_ch']))
                    $data['in_ch']= 0;
                if(!isset($data['in_st']))
                    $data['in_st']= 0;
                if(!isset($data['in_ou']))
                    $data['in_ou']= 0;
                if(!isset($data['in_em']))
                    $data['in_em']= 0;
                if(!isset($data['in_us']))
                    $data['in_us']= 0;

                if(!isset($data['vi_cl']))
                    $data['vi_cl']= 0;
                if(!isset($data['vi_eq']))
                    $data['vi_eq']= 0;
                if(!isset($data['vi_co']))
                    $data['vi_co']= 0;
                if(!isset($data['vi_ar']))
                    $data['vi_ar']= 0;
                if(!isset($data['vi_op']))
                    $data['vi_op']= 0;
                if(!isset($data['vi_ev']))
                    $data['vi_ev']= 0;
                if(!isset($data['vi_ch']))
                    $data['vi_ch']= 0;
                if(!isset($data['vi_st']))
                    $data['vi_st']= 0;
                if(!isset($data['vi_ou']))
                    $data['vi_ou']= 0;
                if(!isset($data['vi_em']))
                    $data['vi_em']= 0;
                if(!isset($data['vi_us']))
                    $data['vi_us']= 0;

                if(!isset($data['ed_cl']))
                    $data['ed_cl']= 0;
                if(!isset($data['ed_eq']))
                    $data['ed_eq']= 0;
                if(!isset($data['ed_co']))
                    $data['ed_co']= 0;
                if(!isset($data['ed_ar']))
                    $data['ed_ar']= 0;
                if(!isset($data['ed_op']))
                    $data['ed_op']= 0;
                if(!isset($data['ed_ev']))
                    $data['ed_ev']= 0;
                if(!isset($data['ed_ch']))
                    $data['ed_ch']= 0;
                if(!isset($data['ed_st']))
                    $data['ed_st']= 0;
                if(!isset($data['ed_ou']))
                    $data['ed_ou']= 0;
                if(!isset($data['ed_em']))
                    $data['ed_em']= 0;
                if(!isset($data['ed_us']))
                    $data['ed_us']= 0;

                if(!isset($data['ex_cl']))
                    $data['ex_cl']= 0;
                if(!isset($data['ex_eq']))
                    $data['ex_eq']= 0;
                if(!isset($data['ex_co']))
                    $data['ex_co']= 0;
                if(!isset($data['ex_ar']))
                    $data['ex_ar']= 0;
                if(!isset($data['ex_op']))
                    $data['ex_op']= 0;
                if(!isset($data['ex_ev']))
                    $data['ex_ev']= 0;
                if(!isset($data['ex_ch']))
                    $data['ex_ch']= 0;
                if(!isset($data['ex_st']))
                    $data['ex_st']= 0;
                if(!isset($data['ex_ou']))
                    $data['ex_ou']= 0;
                if(!isset($data['ex_us']))
                    $data['ex_us']= 0;

                if(!isset($data['ativo']))
                    $data['ativo']= 0;

                //var_dump($data);die;


                // TRANSFORMA EM UMA ARRAY
                $usuario= $this->getEm()->getRepository('Usuario\Entity\Usuario')->find((int) $param);
                $busca= $this->getEm()->getRepository('Usuario\Entity\Permissao')->find($usuario->getIdPermissao()->getIdPermissao());
                $data['id']= $usuario->getIdPermissao()->getIdPermissao();
                if ($permissaoService->save($data)) {
                    //echo "Salvo"; exit;
                    //$data['id_permissao']= $busca[count($busca)-1]->getIdPermissao();
                    $data['id']= (int) $param;
                    $array['id']= (int) $param;
                    //var_dump($data);die;
                    if($service->save($data)){
                        $this->flashMessenger()->addSuccessMessage('Usuário editado com sucesso!');
                    }else{
                        $this->flashMessenger()->addErrorMessage('Não foi possivel editar o usuário!');
                    }
                }else {
                    $this->flashMessenger()->addErrorMessage('Não foi possivel editar o usuário!');
                }


                // RETORNA PARA A PAGINA ANTERIOR
                return $this->redirect()
                    ->toRoute($this->route, array('controller' => $this->controller, 'action' => 'editar', 'id' => $param));

            }


        }else{

            $this->flashMessenger()->addInfoMessage('Registro não foi encontrado!');
            return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
        }


        if($this->flashMessenger()->hasSuccessMessages()){
            return new ViewModel(array(
                'form' => $form,
                'success' => $this->flashMessenger()->getSuccessMessages(),
                'id' => $param,
                'data' => $array
            ));
        }

        if($this->flashMessenger()->hasErrorMessages()){
            return new ViewModel(array(
                'form' => $form,
                'error' => $this->flashMessenger()->getErrorMessages(),
                'id' => $param,
                'data' => $array
            ));
        }

        if($this->flashMessenger()->hasInfoMessages()){
            return new ViewModel(array(
                'form' => $form,
                'warning' => $this->flashMessenger()->getInfoMessages(),
                'id' => $param,
                'data' => $array
            ));
        }

        $this->flashMessenger()->clearMessages();

        return new ViewModel(array('form' => $form, 'id' => $param, 'data' => $array));
    }





    public function editarMeuAction(){


        if(is_string($this->form)){
            $form= new $this->form;
        }else{
            $form= $this->form;
        }
        $request= $this->getRequest();
        $param= $this->params()->fromRoute('id', 0);

        // BUSCA O REPOSITORIO PASSANDO POR PARAMETRO O ID, RETORNANDO APANAS 1 REGISTRO
        $repository= $this->getEm()->getRepository($this->entity)->find($param);

        if($repository){

            // CASO HAJA REGISTRO DO TIPO DATA, CONVERTE-SE PARA TIPO DATA
            $array= array();
            foreach($repository->toArray() as $key => $value){
                if($value instanceof \DateTime)
                    $array[$key]= $value->format('d/m/Y');
                else
                    $array[$key]= $value;
            }

            if($request->isPost()){

                $service= $this->getServiceLocator()->get($this->service);

                // OBTEM O ID DO ITEM A SER EDITADO
                $data= $request->getPost()->toArray();
                // TRANSFORMA EM UMA ARRAY
                $usuario= $this->getEm()->getRepository('Usuario\Entity\Usuario')->find((int) $param);
                //echo "Salvo"; exit;
                //$data['id_permissao']= $busca[count($busca)-1]->getIdPermissao();
                $data['id']= (int) $param;
                //var_dump($data);die;
                if($service->save($data)){
                    $this->flashMessenger()->addSuccessMessage('Cadastrado com sucesso!');
                }else{
                    $this->flashMessenger()->addErrorMessage('Não foi possivel cadastrar!');
                }


                // RETORNA PARA A PAGINA ANTERIOR
                return $this->redirect()
                    ->toRoute($this->route, array('controller' => $this->controller, 'action' => 'editarMeu', 'id' => $param));

            }


        }else{

            $this->flashMessenger()->addInfoMessage('Registro não foi encontrado!');
            return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
        }


        if($this->flashMessenger()->hasSuccessMessages()){
            return new ViewModel(array(
                'form' => $form,
                'success' => $this->flashMessenger()->getSuccessMessages(),
                'id' => $param,
                'data' => $array
            ));
        }

        if($this->flashMessenger()->hasErrorMessages()){
            return new ViewModel(array(
                'form' => $form,
                'error' => $this->flashMessenger()->getErrorMessages(),
                'id' => $param,
                'data' => $array
            ));
        }

        if($this->flashMessenger()->hasInfoMessages()){
            return new ViewModel(array(
                'form' => $form,
                'warning' => $this->flashMessenger()->getInfoMessages(),
                'id' => $param,
                'data' => $array
            ));
        }

        $this->flashMessenger()->clearMessages();

        return new ViewModel(array('form' => $form, 'id' => $param, 'data' => $array));
    }






    public function inserirAction(){

        $this->form= $this->getServiceLocator()->get('Usuario\Form\UsuarioForm');
        $cliente= $this->getEm()->getRepository('Cliente\Entity\Cliente')->findAll();

        $request= $this->getRequest();
        // VARIAVEL UTILIZADO PARA TRATAR OS NUMEROS
        $teste= $request->getPost()->toArray();

        $request= $this->getRequest();


        if($request->isPost()){
            // POPULA O FORMULARIO COM AS INFORMAÇÕES VINDAS VIA POST

            $service= $this->getServiceLocator()->get($this->service);
            $serviceGestor= $this->getServiceLocator()->get('Base\Service\GestorService');
            $serviceAgente= $this->getServiceLocator()->get('Base\Service\AgenteService');
            $serviceVendedor= $this->getServiceLocator()->get('Base\Service\VendedorService');
            $serviceTecnico= $this->getServiceLocator()->get('Base\Service\TecnicoService');

            $permissaoService= $this->getServiceLocator()->get('Usuario\Service\PermissaoService');


            // TRANSFORMA EM UMA ARRAY
            $teste['senha']= md5($teste['senha']);
            $teste['senha_2']= md5($teste['senha_2']);


            if(!isset($teste['in_cl']))
                $teste['in_cl']= 0;
            if(!isset($teste['in_eq']))
                $teste['in_eq']= 0;
            if(!isset($teste['in_co']))
                $teste['in_co']= 0;
            if(!isset($teste['in_ar']))
                $teste['in_ar']= 0;
            if(!isset($teste['in_op']))
                $teste['in_op']= 0;
            if(!isset($teste['in_ev']))
                $teste['in_ev']= 0;
            if(!isset($teste['in_ch']))
                $teste['in_ch']= 0;
            if(!isset($teste['in_st']))
                $teste['in_st']= 0;
            if(!isset($teste['in_ou']))
                $teste['in_ou']= 0;
            if(!isset($teste['in_em']))
                $teste['in_em']= 0;
            if(!isset($teste['in_us']))
                $teste['in_us']= 0;

            if(!isset($teste['vi_cl']))
                $teste['vi_cl']= 0;
            if(!isset($teste['vi_eq']))
                $teste['vi_eq']= 0;
            if(!isset($teste['vi_co']))
                $teste['vi_co']= 0;
            if(!isset($teste['vi_ar']))
                $teste['vi_ar']= 0;
            if(!isset($teste['vi_op']))
                $teste['vi_op']= 0;
            if(!isset($teste['vi_ev']))
                $teste['vi_ev']= 0;
            if(!isset($teste['vi_ch']))
                $teste['vi_ch']= 0;
            if(!isset($teste['vi_st']))
                $teste['vi_st']= 0;
            if(!isset($teste['vi_ou']))
                $teste['vi_ou']= 0;
            if(!isset($teste['vi_em']))
                $teste['vi_em']= 0;
            if(!isset($teste['vi_us']))
                $teste['vi_us']= 0;

            if(!isset($teste['ed_cl']))
                $teste['ed_cl']= 0;
            if(!isset($teste['ed_eq']))
                $teste['ed_eq']= 0;
            if(!isset($teste['ed_co']))
                $teste['ed_co']= 0;
            if(!isset($teste['ed_ar']))
                $teste['ed_ar']= 0;
            if(!isset($teste['ed_op']))
                $teste['ed_op']= 0;
            if(!isset($teste['ed_ev']))
                $teste['ed_ev']= 0;
            if(!isset($teste['ed_ch']))
                $teste['ed_ch']= 0;
            if(!isset($teste['ed_st']))
                $teste['ed_st']= 0;
            if(!isset($teste['ed_ou']))
                $teste['ed_ou']= 0;
            if(!isset($teste['ed_em']))
                $teste['ed_em']= 0;
            if(!isset($teste['ed_us']))
                $teste['ed_us']= 0;

            if(!isset($teste['ex_cl']))
                $teste['ex_cl']= 0;
            if(!isset($teste['ex_eq']))
                $teste['ex_eq']= 0;
            if(!isset($teste['ex_co']))
                $teste['ex_co']= 0;
            if(!isset($teste['ex_ar']))
                $teste['ex_ar']= 0;
            if(!isset($teste['ex_op']))
                $teste['ex_op']= 0;
            if(!isset($teste['ex_ev']))
                $teste['ex_ev']= 0;
            if(!isset($teste['ex_ch']))
                $teste['ex_ch']= 0;
            if(!isset($teste['ex_st']))
                $teste['ex_st']= 0;
            if(!isset($teste['ex_ou']))
                $teste['ex_ou']= 0;
            if(!isset($teste['ex_us']))
                $teste['ex_us']= 0;

            if(!isset($teste['ativo']))
                $teste['ativo']= 0;

            // CONDIÇÃO QUANDO FOR AGENTE
            if($teste['tipo'] == 'agente'){
                $teste['vi_cl']= 1;
                $teste['in_cl']= 1;
                $teste['vi_co']= 1;
                $teste['in_cl']= 1;
                $teste['vi_ar']= 1;
                $teste['vi_op']= 1;
                $teste['vi_ev']= 1;
            }


            //var_dump($teste['in_cl']);die;


            $cod= serialize($this->identity()[0]);
            $teste['id_empresa']= unserialize($cod)->getIdEmpresa()->getIdEmpresa();

            $user= $this->em->getRepository('Usuario\Entity\Usuario')
                ->findByEmail(new Usuario() , $teste['email']);
            //var_dump($user);die;
            if(!$user){
                if($teste['senha'] != $teste['senha_2']){
                    $this->flashMessenger()->addErrorMessage('Senhas não coincidem!');
                }else {
                    if($teste['tipo'] == 'gestor'){
                        if($serviceGestor->save($teste)){
                            $busca= $this->getEm()->getRepository('Base\Entity\Gestor')->findAll();
                            $teste['id_gestor']= $busca[count($busca)-1]->getIdGestor();
                            //var_dump($teste);die;
                            if ($permissaoService->save($teste)) {
                                //echo "Salvo"; exit;
                                $busca= $this->getEm()->getRepository('Usuario\Entity\Permissao')->findAll();
                                $teste['id_permissao']= $busca[count($busca)-1]->getIdPermissao();
                                if($service->save($teste)){
                                    $this->flashMessenger()->addSuccessMessage('Cadastrado com sucesso!');
                                }else{
                                    $this->flashMessenger()->addErrorMessage('Não foi possivel cadastrar!');
                                }
                            }else {
                                $this->flashMessenger()->addErrorMessage('Não foi possivel cadastrar!');
                            }
                        }
                    }


                    if($teste['tipo'] == 'vendedor'){
                        if($serviceVendedor->save($teste)){
                            $busca= $this->getEm()->getRepository('Base\Entity\Vendedor')->findAll();
                            $teste['id_vendedor']= $busca[count($busca)-1]->getIdVendedor();
                            if ($permissaoService->save($teste)) {
                                //echo "Salvo"; exit;
                                $busca= $this->getEm()->getRepository('Usuario\Entity\Permissao')->findAll();
                                $teste['id_permissao']= $busca[count($busca)-1]->getIdPermissao();
                                if($service->save($teste)){
                                    $this->flashMessenger()->addSuccessMessage('Cadastrado com sucesso!');
                                }else{
                                    $this->flashMessenger()->addErrorMessage('Não foi possivel cadastrar!');
                                }
                            }else {
                                $this->flashMessenger()->addErrorMessage('Não foi possivel cadastrar!');
                            }
                        }
                    }


                    if($teste['tipo'] == 'agente'){
                        if($serviceAgente->save($teste)){
                            $busca= $this->getEm()->getRepository('Base\Entity\Agente')->findAll();
                            $teste['id_agente']= $busca[count($busca)-1]->getIdAgente();
                            if ($permissaoService->save($teste)) {
                                //echo "Salvo"; exit;
                                $busca= $this->getEm()->getRepository('Usuario\Entity\Permissao')->findAll();
                                $teste['id_permissao']= $busca[count($busca)-1]->getIdPermissao();
                                if($service->save($teste)){
                                    $this->flashMessenger()->addSuccessMessage('Cadastrado com sucesso!');
                                }else{
                                    $this->flashMessenger()->addErrorMessage('Não foi possivel cadastrar!');
                                }
                            }else {
                                $this->flashMessenger()->addErrorMessage('Não foi possivel cadastrar!');
                            }
                        }
                    }


                    if($teste['tipo'] == 'tecnico'){
                        if($serviceTecnico->save($teste)){
                            $busca= $this->getEm()->getRepository('Base\Entity\Tecnico')->findAll();
                            $teste['id_tecnico']= $busca[count($busca)-1]->getIdTecnico();
                            if ($permissaoService->save($teste)) {
                                //echo "Salvo"; exit;
                                $busca= $this->getEm()->getRepository('Usuario\Entity\Permissao')->findAll();
                                $teste['id_permissao']= $busca[count($busca)-1]->getIdPermissao();
                                if($service->save($teste)){
                                    $this->flashMessenger()->addSuccessMessage('Cadastrado com sucesso!');
                                }else{
                                    $this->flashMessenger()->addErrorMessage('Não foi possivel cadastrar!');
                                }
                            }else {
                                $this->flashMessenger()->addErrorMessage('Não foi possivel cadastrar!');
                            }
                        }
                    }


                    if($teste['tipo'] == 'cliente'){

                        $teste['nome']= $teste['nome_fantasia'];
                        if ($permissaoService->save($teste)) {
                            //echo "Salvo"; exit;
                            $busca= $this->getEm()->getRepository('Usuario\Entity\Permissao')->findAll();
                            $teste['id_permissao']= $busca[count($busca)-1]->getIdPermissao();
                            if($service->save($teste)){
                                $this->flashMessenger()->addSuccessMessage('Cadastrado com sucesso!');
                            }else{
                                $this->flashMessenger()->addErrorMessage('Não foi possivel cadastrar!');
                            }
                        }else {
                            $this->flashMessenger()->addErrorMessage('Não foi possivel cadastrar!');
                        }

                    }

                }

            }else{
                $this->flashMessenger()->addErrorMessage('E-mail já cadastrado!');
            }



            // RETORNA PARA A MESMA PAGINA DE CADASTRO
            return $this->redirect()
                ->toRoute($this->route, array('controller' => $this->controller, 'action' => 'index', 'cliente' => $cliente));

        }

        if($this->flashMessenger()->hasSuccessMessages()){
            return new ViewModel(array(
                'success' => $this->flashMessenger()->getSuccessMessages(),
                'cliente' => $cliente
            ));
        }

        if($this->flashMessenger()->hasErrorMessages()){
            return new ViewModel(array(
                'error' => $this->flashMessenger()->getErrorMessages(),
                'cliente' => $cliente
            ));
        }

        $this->flashMessenger()->clearMessages();

        return new ViewModel(array('cliente' => $cliente));

    }






}
