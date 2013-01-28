<?php

class EditorForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'text' =>  new sfWidgetFormTextarea(array(), array('class' => 'no-editor'))
    ));
	
	$this->widgetSchema->setNameFormat('editor[%s]');
	$this->widgetSchema['text'] = new sfWidgetFormTextarea(array(), array('class' => 'no-editor'));
	
  }
}
