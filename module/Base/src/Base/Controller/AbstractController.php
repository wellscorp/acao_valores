<?php


namespace Base\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\Mvc\Controller\Plugin\Params;

abstract class AbstractController extends AbstractActionController{

	protected $em;
	protected $entity;
	protected $controller;
	protected $route;
	protected $service;
	protected $form;

    /**
     *
     */
    abstract function  __construct();

	public function indexAction(){

		$list= $this->getEm()->getRepository($this->entity)->findAll();

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

	public function inserirAction(){

		if(is_string($this->form)){
			$form= new $this->form;
		}else{
			$form= new $this->form;
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



	public function editarAction(){
		

		if(is_string($this->form)){
			$form= new $this->form;
		}else{
			$form= new $this->form;
		}

		$request= $this->getRequest();
		$param= $this->params()->fromRoute('id', 0);

		$repository= $this->getEm()->getRepository($this->entity)->find($param);

		// CASO HAJA REGISTRO DO TIPO DATA, CONVERTE-SE PARA TIPO DATA
            $array= array();
            foreach($repository->toArray() as $key => $value){
                if($value instanceof \DateTime)
                        $array[$key]= $value->format('d/m/Y');
                else
                    $array[$key]= $value;
            }

            $form->setData($array);
            
		if($repository){

			if($request->isPost()){

				$form->setData($request->getPost());

				if($form->isValid()){
					$service= $this->getServiceLocator()->get($this->service);

					// OBTEM O ID DO ITEM A SER EDITADO
					$data= $request->getPost()->toArray();
					$data['id']= (int) $param;
					// TRANSFORMA EM UMA ARRAY
					if($service->save($data)){
						//echo "Salvo"; exit;
						$this->flashMessenger()->addSuccessMessage('Atualizado com sucesso!');
					}else{
						$this->flashMessenger()->addErrorMessage('Não foi possivel atualizar!');
					}
					// RETORNA PARA A PAGINA ANTERIOR
					return $this->redirect()
                        ->toRoute($this->route, array('controller' => $this->controller, 'action' => 'editar', 'id' => $param));
				}
			}	


		}else{

			$this->flashMessenger()->addInfoMessage('Registro não foi encontrado!');
			return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
		}


		if($this->flashMessenger()->hasSuccessMessages()){
			return new ViewModel(array(
				'form' => $form, 
				'success' => $this->flashMessenger()->getSuccessMessages(),
				'id' => $param
			));
		}

		if($this->flashMessenger()->hasErrorMessages()){
			return new ViewModel(array(
				'form' => $form, 
				'error' => $this->flashMessenger()->getErrorMessages(),
				'id' => $param
			));
		}

		if($this->flashMessenger()->hasInfoMessages()){
			return new ViewModel(array(
				'form' => $form, 
				'warning' => $this->flashMessenger()->getInfoMessages(),
				'id' => $param
			));
		}

		$this->flashMessenger()->clearMessages();

		return new ViewModel(array('form' => $form, 'id' => $param));
	}


    /**
     * @return \Zend\Http\Response
     */


	public function excluirAction(){
		

		$service= $this->getServiceLocator()->get($this->service);
		$id= $this->params()->fromRoute('id', 0);

		if($service->remove(array('id' => $id)))
			$this->flashMessenger()->addSuccessMessage('Registro deletado com sucesso!');
		else
			$this->flashMessenger()->addErrorMessage('Não foi possivel deletar registro!');
		return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
	}


	public function getEm(){
		
		if($this->em == null){
			$this->em= $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		}

		return $this->em;
	}
}

?>