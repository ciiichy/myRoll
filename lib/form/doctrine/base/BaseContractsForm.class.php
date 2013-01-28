<?php
#include_once('../BaseFormDoctrine.php');
/**
 * Contracts form base class.
 *
 * @method Contracts getObject() Returns the current form's model object
 *
 * @package    roLL
 * @subpackage form
 * @author     Piotr Cichocki
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseContractsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInputText(),
      'client_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Clients'), 'add_empty' => false)),
      'product_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Product'), 'add_empty' => false)),
      'prize'      => new sfWidgetFormInputText(),
      'month'      => new sfWidgetFormInputText(),
      'date_from'  => new sfWidgetFormDate(),
      'date_to'    => new sfWidgetFormDate(),
      'remind_pay' => new sfWidgetFormInputCheckbox(),
      'remind_end' => new sfWidgetFormInputCheckbox(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'client_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Clients'))),
      'product_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Product'))),
      'prize'      => new sfValidatorNumber(array('required' => false)),
      'month'      => new sfValidatorInteger(),
      'date_from'  => new sfValidatorDate(array('required' => false)),
      'date_to'    => new sfValidatorDate(array('required' => false)),
      'remind_pay' => new sfValidatorBoolean(array('required' => false)),
      'remind_end' => new sfValidatorBoolean(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('contracts[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
	
    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Contracts';
  }

}
