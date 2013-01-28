<?php

/**
 * contract actions.
 *
 * @package    roLL
 * @subpackage contract
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contractActions extends sfActions {
	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeList(sfWebRequest $request) {
		//$this -> form  new ContractsForm();

		try {
			if ($request -> isMethod('post')) {
				if ($data = $request -> getParameter('contract')) {
					//$this -> form -> bind($data);
					if ($data['client_id'] == 0){
						throw Exception("Wybierz klienta");
					}
					if ($data['product_id'] == 0){
						throw Exception("Wybierz produkt");
					}					
					if (Contracts::addRow($data)) {
						throw new Exception("Umowa została zapisana");
					} else {
						throw new Exception("Błąd połączenia z bazą danych. Spóbuj ponownie później");
					}

				}
			}

		} catch(exception $e) {
			$this -> msg = $e -> getMessage();
		}

		if ($request -> getParameter('act') == 'showall') {
			$this -> contracts = Contracts::getAll('updated_at desc');
		} elseif ($request -> getParameter('phrase')) {
			$this -> contracts = Contracts::search($request -> getParameter('phrase'));
		} else {
			$contracts = Contracts::getPart(0, 5, 'updated_at', 'desc');
			$this -> contracts = $contracts['rows'];
		}

	}

	public function executeGetclients(sfWebRequest $request) {
		$html = "";
		foreach (Clients::getAll('name') as $c) {
			$html .= "<option value='" . $c -> getId() . "'>" . $c -> getName() . "</option>";
		}
		print $html;
		return true;
	}

	public function executeGetproducts(sfWebRequest $request) {
		$html = "";
		foreach (Product::getAll('name') as $c) {
			$html .= "<option value='" . $c -> getId() . "'>" . $c -> getName() . "</option>";
		}
		print $html;
		return true;
	}

	public function executeDelete(sfWebRequest $request) {
		$id = $request -> getParameter('id');
		if (!Contracts::existKey($id)) {
			return false;
		}
		Contracts::deleteRow($id);
		return true;
	}
	
	public function executeGetPrize(sfWebRequest $request) {
		$id = $request -> getParameter('id');
		if (!Product::existKey($id)) {
			return false;
		}
		
		$c = Product::getRow($id);
		print $c->getPrize(); 
		return true;
	}	
	

	public function executeEdit(sfWebRequest $request) {
		$id = $request -> getParameter('id');
		if ($data = $request -> getParameter('contract') and Contracts::existKey($id)) {
			Contracts::editRow($id, $data);
		}
		$this -> redirect('contract/list');
	}

	public function executeGetContract(sfWebRequest $request) {
		if ($request -> isMethod('post')) {
			$id = $request -> getParameter('id');

			if (!Contracts::existKey($id)) {
				return false;
			}
			$c = Contracts::getRow($id);
			$data = array('name' => $c -> getName(), 'client_id' => $c -> getClientId(), 'product_id' => $c -> getProductId(), 'month' => $c -> getMonth(), 'date_from' => $c -> getDateFrom(), 'date_to' => $c -> getDateTo(), 'remind_pay' => $c -> getRemindPay(), 'remind_end' => $c -> getRemindEnd(), 'prize' => $c -> getPrize(), );
			echo json_encode($data);
			return true;

		}
	}

}
