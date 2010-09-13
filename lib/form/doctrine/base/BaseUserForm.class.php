<?php

/**
 * User form base class.
 *
 * @method User getObject() Returns the current form's model object
 *
 * @package    petgroom
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'second_name' => new sfWidgetFormInputText(),
      'email'       => new sfWidgetFormInputText(),
      'birthday'    => new sfWidgetFormDateTime(),
      'gender'      => new sfWidgetFormChoice(array('choices' => array('Male' => 'Male', 'Female' => 'Female'))),
      'address'     => new sfWidgetFormInputText(),
      'city'        => new sfWidgetFormInputText(),
      'cap'         => new sfWidgetFormInputText(),
      'phone'       => new sfWidgetFormInputText(),
      'cell'        => new sfWidgetFormInputText(),
      'info'        => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'second_name' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'       => new sfValidatorString(array('max_length' => 255)),
      'birthday'    => new sfValidatorDateTime(array('required' => false)),
      'gender'      => new sfValidatorChoice(array('choices' => array(0 => 'Male', 1 => 'Female'), 'required' => false)),
      'address'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'city'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cap'         => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'phone'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cell'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'info'        => new sfValidatorString(array('max_length' => 2500, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

}
