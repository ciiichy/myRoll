<?php

/**
 * Contracts form.
 *
 * @package    roLL
 * @subpackage form
 * @author     Piotr Cichocki
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContractsForm extends BaseContractsForm {
	public function configure() {
		$this->disableCSRFProtection();
	    unset(
	      $this['created_at'], $this['updated_at']
	    );
		
		
	}

}
