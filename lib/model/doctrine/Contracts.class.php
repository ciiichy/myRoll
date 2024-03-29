<?php

/**
 * Contracts
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    roLL
 * @subpackage model
 * @author     Piotr Cichocki
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Contracts extends BaseContracts
{
	function getColor(){
		$days14 = 14*60*60*24;
		$diff = strtotime($this->date_to) - time() ; 
		if ($diff+$days14 < 0){
			return 'red';
		}elseif($diff < $days14){
			return 'blue';
		}else{
			return false;
		}
	}
	
	static function search($phrase){
		$phrase = mb_convert_case($phrase, MB_CASE_UPPER, "UTF-8");
		return Doctrine_Query::CREATE()
		->from("contracts c")
		->leftJoin('c.Clients cc')
		->leftJoin('c.Product cp')
		->where("UPPER(c.name) like '%".$phrase."%'")
		->orwhere("UPPER(cp.name) like '%".$phrase."%'")
		->orwhere("UPPER(cc.name) like '%".$phrase."%'")
		->orwhere("UPPER(cp.description) like '%".$phrase."%'")
		->execute();
		
	}
	
}
