<?php

class LoginForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'login' => new sfWidgetFormInput(), 
      'password' => new sfWidgetFormInputPassword() 
    ));
    
    $this->setValidators(array(
      'login' => new sfValidatorString(array(),array('required'=>'Wpisz login')), 
      'password' => new sfValidatorString(array(),array('required'=>'Wpisz hasło'))
    ));
	
    $this->widgetSchema->setLabels(array(
      'login'    => 'Login',
      'password'   => 'Hasło',
    ));	

	$this->widgetSchema['login']->setAttribute("class","inp");
	$this->widgetSchema['password']->setAttribute("class","inp");
	
	$this->widgetSchema->setNameFormat('login[%s]');
  }
}
