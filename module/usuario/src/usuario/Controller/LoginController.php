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
use Zend\Authentication\AuthenticationService;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\Paginator\Paginator;
use Zend\View\Model\ViewModel;

class LoginController extends AbstractController
{

    /**
     *
     */

    // FOI TROCADO A TABELA DE IMOVEIS POR USUARIO

    function __construct()
    {
        //echo 'hello world';
        $this->form= 'usuario\Form\usuarioForm';
        $this->controller= 'Login';
        $this->route= 'login';
        $this->service= 'usuario\service\usuarioService';
        $this->entity= 'usuario\Entity\Usuario';
    }



    public function loginAction(){

        return new ViewModel();
    }


    public function indexAction(){

        $request= $this->getRequest();
        if($request->isPost()){


            $data= $request->getPost()->toArray();
            /**
             * @var $auth \Zend\Authentication\AuthenticationService
             * @var $adapter \Auth\Authentication\Adapter
             */
            $auth= $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
            //$auth= new AuthenticationService();

            $adapter= $auth->getAdapter();
            //var_dump($auth);die;
            $adapter->setNome($data['email']);
            $adapter->setSenha($data['senha']);

            if($auth->authenticate()->isValid()){

                $repository= $this->getEm()->getRepository($this->entity)->find($this->identity()[0]->getIdUsuario());
                $array= array();
                foreach($repository->toArray() as $key => $value){
                    if($value instanceof \DateTime)
                        $array[$key]= $value->format('d/m/Y');
                    else
                        $array[$key]= $value;
                }

                $array['id']= $array['id_usuario'];
                $array['dt_login']= date('Y').date('m').date('d');
                if(strlen(date('i'))==1)
                    $array['hr_login']= date('H').'0'.date('i');
                else
                    $array['hr_login']= date('H').date('i');

                $service= $this->getServiceLocator()->get($this->service);
                $service->save($array);
                return $this->redirect()->toRoute('usuario', array('controller' => 'usuario', 'action' => 'index'));

            }

            $mensagem= $auth->authenticate()->getMessages();
            $this->flashMessenger()->addErrorMessage($mensagem[0]);
            //echo var_dump($mensagem);die;
            return new ViewModel(array(
                'error' => $mensagem
            ));

        }
    }



    public function logoutAction(){

        /**
         * @var $auth \Zend\Authentication\AuthenticationService
         */

        //var_dump($this->identity());
        $repository= $this->getEm()->getRepository($this->entity)->find($this->identity()[0]->getIdUsuario());

        /*
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
        */

        $auth= $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
        $auth->clearIdentity();
        return $this->redirect()->toRoute('login', array('controller' => 'Login', 'action' => 'index'));

    }

}
