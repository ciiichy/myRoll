<?php

/**
 * Product
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    roLL
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Product extends BaseProduct
{
	
	function getAmountContracts(){
		return Contracts::getAmountFiltr('product_id', $this->id);
	}
	
}