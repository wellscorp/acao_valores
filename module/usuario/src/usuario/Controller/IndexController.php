<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace usuario\Controller;

use Base\Controller\AbstractController;
//use Zend\Mvc\Controller\AbstractActionController;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\Paginator\Paginator;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractController
{

    /**
     *
     */

    // FOI TROCADO A TABELA DE IMOVEIS POR USUARIO

    function __construct()
    {
        //echo 'hello world';
        $this->form= 'usuario\Form\usuarioForm';
        $this->controller= 'usuario';
        $this->route= 'usuario';
        $this->service= 'usuario\service\usuarioService';
        $this->entity= 'usuario\Entity\Usuario';
    }




    public  function indexAction(){


        $list= $this->getEm()->getRepository($this->entity)->findAll();
        $grupos= $this->getEm()->getRepository('grupo\Entity\Grupo')->findAll();

        $page= $this->params()->fromRoute('page');

        $paginator= new Paginator(new ArrayAdapter($list));
        $paginator->setCurrentPageNumber($page)
            // QUANTIDADE DE ITENS QUE HAVERAM EM CADA PAGINA
            ->setDefaultItemCountPerPage(10);


        // VALIDAR FORMULARIO
        $request= $this->getRequest();
        if($request->isPost()){

            $service= $this->getServiceLocator()->get($this->service);
            $data= $request->getPost()->toArray();
            $data['senha']= md5($data['senha']);
            if($service->save($data)){
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
                'data' => $paginator, 'page' => $page, 'grupo' => $grupos,
                'success' => $this->flashMessenger()->getSuccessMessages()
            ));
        }
        if($this->flashMessenger()->hasErrorMessages()){
            return new ViewModel(array(
                'data' => $paginator, 'page' => $page, 'grupo' => $grupos,
                'error' => $this->flashMessenger()->getErrorMessages()
            ));
        }

        return new ViewModel(array( 'data' => $paginator, 'page' => $page, 'grupo' => $grupos));
    }



}
