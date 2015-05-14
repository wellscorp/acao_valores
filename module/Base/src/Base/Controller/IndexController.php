<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Base\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\Paginator\Paginator;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractController
{

    function __construct()
    {

        $this->form= 'Base\Form\AcaoForm';
        $this->controller= 'Base';
        $this->route= 'Base';
        $this->service= 'Base\Service\acaoService';
        $this->entity= 'Base\Entity\AcoAcao';
        $this->itensPorPagina= 8;



    }

    public function indexAction()
    {
        $list= $this->getEm()->getRepository('Base\Entity\AcoAcao')->findAll();

        $page= $this->params()->fromRoute('page');

        $paginator= new Paginator(new ArrayAdapter($list));
        $paginator->setCurrentPageNumber($page)
            // QUANTIDADE DE ITENS QUE HAVERAM EM CADA PAGINA
            ->setDefaultItemCountPerPage(10);


        // VALIDAR FORMULARIO
        $request= $this->getRequest();
        if($request->isPost()){

            $service= $this->getServiceLocator()->get($this->service);
            // TRANSFORMA EM UMA ARRAY
            if($service->save($request->getPost()->toArray())){
                //echo "Salvo"; exit;
                $this->flashMessenger()->addSuccessMessage('Cadastrado com sucesso!');
            }else{
                $this->flashMessenger()->addErrorMessage('Não foi possivel cadastrar!');
            }

            // RETORNA PARA A MESMA PAGINA DE CADASTRO
            return $this->redirect()
                ->toRoute($this->route, array('controller' => $this->controller, 'action' => 'index')); //
        }

        if($this->flashMessenger()->hasSuccessMessages()){
            return new ViewModel(array(
                'data' => $paginator, 'page' => $page,
                'success' => $this->flashMessenger()->getSuccessMessages()
            ));
        }
        if($this->flashMessenger()->hasErrorMessages()){
            return new ViewModel(array(
                'data' => $paginator, 'page' => $page,
                'error' => $this->flashMessenger()->getErrorMessages()
            ));
        }

        return new ViewModel(array( 'data' => $paginator, 'page' => $page));
    }


    public function carteiraAcoesAction()
    {
        return new ViewModel();
    }



    public function acoesAction(){


        $this->service= 'Base\Service\operacoesService';
        $acao= $this->getEm()->getRepository('Base\Entity\AcoAcao')->findAll();

        if(is_string($this->form)){
            $form= new $this->form;
        }else{
            $form= $this->form;
        }

        $request= $this->getRequest();

        if($request->isPost()){
            $form->setData($request->getPost());
            $data= $request->getPost()->toArray();
            //$data['OPR_DATA_OPERACAO']= $data['OPR_DATA_OPERACAO'];
            $data['OPR_USUARIO']= 5;
            //var_dump($data);die;

            $service= $this->getServiceLocator()->get($this->service);
            // TRANSFORMA EM UMA ARRAY
            if($service->save($data)){
                //echo "Salvo"; exit;
                $this->flashMessenger()->addSuccessMessage('Cadastrado com sucesso!');
            }else{
                $this->flashMessenger()->addErrorMessage('Não foi possivel cadastrar!');
            }

            // RETORNA PARA A MESMA PAGINA DE CADASTRO
            return $this->redirect()
                ->toRoute($this->route, array('controller' => $this->controller, 'action' => 'acoes', 'acao' => $acao)); //

        }

        if($this->flashMessenger()->hasSuccessMessages()){
            return new ViewModel(array(
                'form' => $form,
                'success' => $this->flashMessenger()->getSuccessMessages(), 'acao' => $acao
            ));
        }

        if($this->flashMessenger()->hasErrorMessages()){
            return new ViewModel(array(
                'form' => $form,
                'error' => $this->flashMessenger()->getErrorMessages(), 'acao' => $acao
            ));
        }

        $this->flashMessenger()->clearMessages();

        return new ViewModel(array('form' => $form, 'acao' => $acao));
    }



    public function usuarioAction()
    {
        $this->form= 'Base\Form\UsuarioForm';
        $this->service= 'Base\Service\usuarioService';

        return parent::inserirAction();
    }

    public function notificacaoAction()
    {

        $this->service= 'Base\Service\notificacaoService';
        $acao= $this->getEm()->getRepository('Base\Entity\AcoAcao')->findAll();

        if(is_string($this->form)){
            $form= new $this->form;
        }else{
            $form= $this->form;
        }

        $request= $this->getRequest();

        if($request->isPost()){
            $form->setData($request->getPost());
            $data= $request->getPost()->toArray();
            //$data['OPR_DATA_OPERACAO']= $data['OPR_DATA_OPERACAO'];
            $data['NTF_USUARIO']= 5;
            //var_dump($data);die;

            $service= $this->getServiceLocator()->get($this->service);
            // TRANSFORMA EM UMA ARRAY
            if($service->save($data)){
                //echo "Salvo"; exit;
                $this->flashMessenger()->addSuccessMessage('Cadastrado com sucesso!');
            }else{
                $this->flashMessenger()->addErrorMessage('Não foi possivel cadastrar!');
            }

            // RETORNA PARA A MESMA PAGINA DE CADASTRO
            return $this->redirect()
                ->toRoute($this->route, array('controller' => $this->controller, 'action' => 'notificacao', 'acao' => $acao)); //

        }

        if($this->flashMessenger()->hasSuccessMessages()){
            return new ViewModel(array(
                'form' => $form,
                'success' => $this->flashMessenger()->getSuccessMessages(), 'acao' => $acao
            ));
        }

        if($this->flashMessenger()->hasErrorMessages()){
            return new ViewModel(array(
                'form' => $form,
                'error' => $this->flashMessenger()->getErrorMessages(), 'acao' => $acao
            ));
        }

        $this->flashMessenger()->clearMessages();

        return new ViewModel(array('form' => $form, 'acao' => $acao));
    }

    public function testeAction()
    {
        $this->form= 'Base\Form\AcaoForm';
        $this->service= 'Base\Service\usuarioService';

        $list= $this->getEm()->getRepository('Base\Entity\OprOperacoes')->findAll();


        return new ViewModel(array('data' => $list ));
    }

}
