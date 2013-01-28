<?php

/**
 * Clients form base class.
 *
 * @method Clients getObject() Returns the current form's model object
 *
 * @package    roLL
 * @subpackage form
 * @author     Piotr Cichocki
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClientsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInputText(),
      'address'    => new sfWidgetFormInputText(),
      'nip'        => new sfWidgetFormInputText(),
      'regon'      => new sfWidgetFormInputText(),
      'email'      => new sfWidgetFormInputText(),
      'tel'        => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 255)),
      'address'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nip'        => new sfValidatorString(array('max_length' => 31, 'required' => false)),
      'regon'      => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'email'      => new sfValidatorString(array('max_length' => 127)),
      'tel'        => new sfValidatorString(array('max_length' => 63, 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('clients[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Clients';
  }

}
