<?php

/**
 * main actions.
 *
 * @package    roLL
 * @subpackage main
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mainActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  		
  	if ($request->getParameter('act')=='showall'){
  		$this->contracts = Contracts::getAll('date_to');
  	}else{
  		$contracts = Contracts::getPart(0, 5, 'date_to');
  		$this->contracts = $contracts['rows'];
	}
	
	
  }
}
