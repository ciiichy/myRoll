<?php

class AddUserForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'login' => new sfWidgetFormInput(),
      'name' => new sfWidgetFormInput(),
      'type' => new sfWidgetFormChoice(array('choices' => array('administrator', 'użytkownik'))), 
      'email' => new sfWidgetFormInput(),
      'password' => new sfWidgetFormInputPassword(),
      'password2' => new sfWidgetFormInputPassword(),
    ));
    
    $this->setValidators(array(
      'login' => new sfValidatorString(), 
      'name' => new sfValidatorString(array('required' => false)),
      'type' => new sfValidatorChoice(array('choices' => array('administrator', 'użytkownik'))),
      'email' => new sfValidatorEmail(),
      'password' => new sfValidatorString(array(),array('required'=>'Wpisz hasło')),
      'password2' => new sfValidatorString(array('required'=>'false')),
      
    ));
	
    $this->widgetSchema->setLabels(array(
      'login'    => 'login:',
      'name'    => 'imie i nazwisko:',
      'type'    => 'uprawnienia:',
      'password'   => 'hasło:',
      'password2'   => 'powtórz hasło:',
      'email'   => 'adres email:',
    ));	

	$this->widgetSchema['login']->setAttribute("class","inp");
	$this->widgetSchema['password']->setAttribute("class","inp");
	$this->widgetSchema['name']->setAttribute("class","inp");
	$this->widgetSchema['password2']->setAttribute("class","inp");
	$this->widgetSchema['email']->setAttribute("class","inp");
	$this->widgetSchema['type']->setAttribute("class","inp_sel");
	
	$this->widgetSchema->setNameFormat('user[%s]');
  }
}
