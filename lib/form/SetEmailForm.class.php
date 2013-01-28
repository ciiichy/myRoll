<?php

class setEmailForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'email1' => new sfWidgetFormInput(),
      'email2' => new sfWidgetFormInput(), 
    ));
    
    $this->setValidators(array(
      'email1' => new sfValidatorEmail(),
      'email2' => new sfValidatorEmail(), 
    ));
	
    $this->widgetSchema->setLabels(array(
      'email1'    => 'e-mail:',
      'email2'    => 'powtórz e-mail:',
    ));	

	$this->widgetSchema['email1']->setAttribute("class","inp");
	$this->widgetSchema['email2']->setAttribute("class","inp");
	
	
	$this->widgetSchema->setNameFormat('email[%s]');
  }
}
