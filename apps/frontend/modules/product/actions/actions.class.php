<?php

/**
 * product actions.
 *
 * @package    roLL
 * @subpackage product
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class productActions extends sfActions {
	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeList(sfWebRequest $request) {
		try {
			if ($request -> isMethod('post')) {
				if ($data = $request -> getParameter('product')) {
					if (!Product::addRow($data)) {
						throw new Exception("Błąd połączenia z bazą danych. Spróbuj ponownie");
					}
					throw new Exception("Produkt został dodany poprawnie");
				}
			}
		} catch(exception $e) {
			$this -> msg = $e -> getMessage();
		}

		if($request->getParameter('phrase')){
			$this->products = Product::searchByCols($request->getParameter('phrase'),array('name','description'));		
		}elseif ($request->getParameter('act')=='showall'){
			$this->products = Product::getAll('updated_at desc');	
		}else{
			$product = Product::getPart(0, 5, 'updated_at', 'desc');
			$this -> products = $product['rows'];
		}

	}

	public function executeDelete(sfWebRequest $request) {
		$id = $request -> getParameter('id');
		if (!Product::existKey($id)) {
			return false;
		}
		Product::deleteRow($id);
		return true;
	}
	
	public function executeGetProduct(sfWebRequest $request) {
		if ($request->isMethod('post')){
			$id = $request -> getParameter('id');

			if (!Product::existKey($id)){
				return false;
			}
			$c = Product::getRow($id);
			$data = array('name'	=> $c->getName(),
				  'description' => $c->getDescription(),
				  'prize'		=> $c->getPrize(),
				  'regon' 	=> $c->getRegon(),
				  'month' 	=> $c->getMonth(),
				  );
			echo json_encode($data);
			return true;		
			
		}
	}
	
	public function executeEdit(sfWebRequest $request) {
		$id = $request -> getParameter('id');
		if ($data = $request -> getParameter('product') and Product::existKey($id)) {
			Product::editRow($id, $data);
		}
		$this->redirect('product/list');
	}		
	

}
