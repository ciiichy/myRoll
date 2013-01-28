<?php

/**
 * config actions.
 *
 * @package    roLL
 * @subpackage config
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class configActions extends sfActions {
	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeIndex(sfWebRequest $request) {
	}

	public function executeConfig(sfWebRequest $request) {
		$this -> form_vat = new VatForm();
		$this -> form_email = new setEmailForm();

		$vat = Configs::getConfig('vat');
		if ($vat) {
			$this -> form_vat -> setDefault('vat', $vat);
		}
		$email = Configs::getConfig('admin_email');
		if ($email) {
			$this -> form_email -> setDefault('email1', $email);
		}
		
		

		try {
			if ($request -> isMethod('post')) {
				if ($data = $request -> getParameter('vat')) {
					$this -> form_vat -> bind($data);
					if ($this -> form_vat -> isValid()) {
						if (!Configs::setConfig('vat', $data['vat'])) {
							throw new Exception("Błąd połączenia z bazą danych. Spróbuj ponownie");
						}
						$this -> form_vat -> setDefault('vat', $data['vat']);
						throw new Exception("Stawka vat została zapisana");
					} else {
						throw new Exception("Stawka vat musi być liczbą");
					}

				} elseif ($data = $request -> getParameter('email')) {
					$this -> form_email -> bind($data);
					if ($this -> form_email -> isValid()) {
						if ($data['email1'] != $data['email2']) {
							throw new Exception("Podane adresy się róźnią");
						}

						if (!Configs::setConfig('admin_email', $data['email1'])) {
							throw new Exception("Błąd połączenia z bazą danych. Spróbuj ponownie");
						}
						$this -> form_vat -> setDefault('email1', $data['email1']);
						throw new Exception("Adres e-mail administratora został zapisany");
					} else {
						throw new Exception("Zły adres e-mail");
					}

				}
			}

		} catch(exception $e) {
			$this -> msg = $e -> getMessage();
		}
		


	}

	public function executeAccess(sfWebRequest $request) {
		//TODO: walidacje przez isValid (blad przy walidacji loginu)
		$this -> form = new AddUserForm();
		try {
			if ($request -> isMethod('post')) {
				$data = $request -> getParameter('user');
				#$this -> form -> bind($data);
				if ($data['password'] != $data['password2']){
					throw new Exception("Podane hasła się róźnią");
				}
				
				if (Users::existRowByName('login', $data['login'])){
					throw new Exception("Użytkownik o podanym loginie istnieje już w bazie");
				}
				
				if (strlen($data['login']) < 2 or strlen($data['password']) < 3){
					throw new Exception("Uzupełnij poprawnie pola");
				}
				
				$data['type'] = $data['type'] ? 'user' : 'admin';	
				$data['password'] = md5($data['password']);
				if (!Users::addRow($data)){
					throw new Exception("Błąd połączenia z bazą danych. Spróbuj ponownie");
				}
				throw new Exception("Użytkownik został dodany");
			} 
		} catch(exception $e) {
			$this -> msg = $e -> getMessage();
		}
		
		
		if ($id = $request->getParameter('delete')){
			if (!Users::existKey($id)){
				$this->redirect('config/access');
			}
			Users::deleteRow($id);
			$this->redirect('config/access');
		}
		
		
		$this->users = Users::getAll('name');

	}

}
