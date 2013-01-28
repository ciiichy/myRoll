<?php

/**
 * client actions.
 *
 * @package    roLL
 * @subpackage client
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class clientActions extends sfActions {
	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeList(sfWebRequest $request) {
		try {
			if ($request -> isMethod('post')) {
				if ($data = $request -> getParameter('client')) {
					if (!Clients::addRow($data)) {
						throw new Exception("Błąd połączenia z bazą danych. Spróbuj ponownie");
					}
					throw new Exception("Klient został dodany poprawnie");
				}
			}
		} catch(exception $e) {
			$this -> msg = $e -> getMessage();
		}

		if($request->getParameter('phrase')){
			$this->clients = Clients::searchByCols($request->getParameter('phrase'),array('name','email','address'));		
		}
		elseif ($request->getParameter('act')=='showall'){
			$this->clients = Clients::getAll('updated_at desc');	
		}else{
			$clients = Clients::getPart(0, 5, 'updated_at', 'desc');
			$this -> clients = $clients['rows'];
		}

	}
	
	public function executeEdit(sfWebRequest $request) {
		$id = $request -> getParameter('id');
		if ($data = $request -> getParameter('client') and Clients::existKey($id)) {
			Clients::editRow($id, $data);
		}
		$this->redirect('client/list');
	}	

	public function executeDelete(sfWebRequest $request) {
		$id = $request -> getParameter('id');
		if (!Clients::existKey($id)){
			return false;
		}
		Clients::deleteRow($id);
		return true;
	}

	public function executeGetClient(sfWebRequest $request) {
		if ($request->isMethod('post')){
			$id = $request -> getParameter('id');

			if (!Clients::existKey($id)){
				return false;
			}
			$c = Clients::getRow($id);
			$data = array('name'	=> $c->getName(),
				  'address' => $c->getAddress(),
				  'nip'		=> $c->getNip(),
				  'regon' 	=> $c->getRegon(),
				  'email' 	=> $c->getEmail(),
				  'tel'  	=> $c->getTel()
				  );
			echo json_encode($data);
			return true;		
			
		}
	}

	public function executeGetContracts(sfWebRequest $request) {
		$id = $request -> getParameter('id');
		if (!Clients::existKey($id)){
			return false;
		}
		
		$rows = Contracts::getRowByName('client_id', $id);
		$txt = '<div class="panel" name="contracts">   <div id="umowy_naglowek"></div>
  			  <div class="content"> 	 	<div id="umowy_status"></div>
    			<div class="tablica">   <table cellspacing="2" cellpadding="5">
     		   <tr>      	<th class="s8">produkt</th>    	<th class="s9">klient</th>
        	<th class="s10">od:</th> 	<th class="s11">do:</th>
        	<th class="s12">umowa</th>     </tr>
      		  </table><div class="separator"></div>  <table  cellspacing="2" cellpadding="5">';
		foreach ($rows as $r){
			$txt .= '
        <tr>
        	<td class="s8">'.$r->getProduct()->getName().'</td>
        	<td class="s9">'.$r->getClients()->getName().'</td>
        	<td class="s10">'.$r->getDateFrom().'</td>
        	<td class="s11">'.$r->getDateTo().'</td>
       	 	<td class="s12"><a href="#"><img src="/images/ico_mailmarked.png"  /></a></td><!-- rodzaj ikony ico_mail.png lub ico_mailmarked.png  -->
        </tr>';
		}
		
		$txt .='</table></div>  </div></div>';
		print $txt;
		return true;
	}

}
