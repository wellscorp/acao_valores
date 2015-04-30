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
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    function __construct()
    {

        $this->form= 'Base\Form\FornecedorForm';
        $this->controller= 'Base';
        $this->route= 'Base';
        $this->service= 'Base\Service\UsuarioService';
        $this->entity= 'Base\Entity\Usuario';
        $this->itensPorPagina= 8;



    }

    public function indexAction()
    {
        return new ViewModel();
    }


    public function carteiraAcoesAction()
    {
        return new ViewModel();
    }

    public function acoesAction(){

        if(is_string($this->form)){
            $form= new $this->form;
        }else{
            $form= $this->form;
        }

        $request= $this->getRequest();

        if($request->isPost()){
            $form->setData($request->getPost());

            if($form->isValid()){
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
                    ->toRoute($this->route, array('controller' => $this->controller, 'action' => 'inserir')); //
            }
        }

        if($this->flashMessenger()->hasSuccessMessages()){
            return new ViewModel(array(
                'form' => $form,
                'success' => $this->flashMessenger()->getSuccessMessages()
            ));
        }

        if($this->flashMessenger()->hasErrorMessages()){
            return new ViewModel(array(
                'form' => $form,
                'error' => $this->flashMessenger()->getErrorMessages()
            ));
        }

        $this->flashMessenger()->clearMessages();

        return new ViewModel(array('form' => $form));
    }
}
