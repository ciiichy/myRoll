<?php

/**
 * login actions.
 *
 * @package    roLL
 * @subpackage login
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class loginActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    if ($this->getUser()->isAuthenticated()){
    	$this->redirect('main/index');
    }
		
    $this->form = new LoginForm();
	if ($request->isMethod('post')){
		$data = $request -> getParameter('login');
		$this -> form -> bind( $data);
		
		if ($this->form->isValid()){
			$login = $data['login'];
			$password = md5($data['password']);
			$user = Users::authUser($login, $password);
			if (count($user)){
				$user = $this->getUser();
				$user -> setAttribute('login', $login);
				$user -> setAuthenticated('name', $user->name);
				$user -> setAuthenticated(true);
				$user -> addCredential($user->type);
				$this->redirect('main/index');
			}else{
				$this->msg = "Zły login lub hasło";
			}
			
		}else{
			$this->msg = "Wpisz poprawne dane";
		}
	}

    return sfView::SUCCESS;
  }
  

  
  
}
