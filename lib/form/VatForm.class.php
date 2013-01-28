<?php

class VatForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'vat' => new sfWidgetFormInput(), 
    ));
    
    $this->setValidators(array(
      'vat' => new sfValidatorInteger(array("min" => 0, "max" => 100),array('required' =>'Podaj stawkę','invalid'=>"Stawka vat musi wynosić od 0 do 100")), 
    ));
	
    $this->widgetSchema->setLabels(array(
      'vat'    => 'stawka vat (%):',
    ));	

	$this->widgetSchema['vat']->setAttribute("class","inp");
	
	$this->widgetSchema->setNameFormat('vat[%s]');
  }
}
