<?php

/**
 * Users form base class.
 *
 * @method Users getObject() Returns the current form's model object
 *
 * @package    roLL
 * @subpackage form
 * @author     Piotr Cichocki
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUsersForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'login'      => new sfWidgetFormInputText(),
      'password'   => new sfWidgetFormInputText(),
      'name'       => new sfWidgetFormInputText(),
      'email'      => new sfWidgetFormInputText(),
      'type'       => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'login'      => new sfValidatorString(array('max_length' => 255)),
      'password'   => new sfValidatorString(array('max_length' => 255)),
      'name'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'      => new sfValidatorString(array('max_length' => 127)),
      'type'       => new sfValidatorString(array('max_length' => 32)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('users[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Users';
  }

}
