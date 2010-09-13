<?php

/**
 * Dog form base class.
 *
 * @method Dog getObject() Returns the current form's model object
 *
 * @package    petgroom
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDogForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'name'     => new sfWidgetFormInputText(),
      'photo'    => new sfWidgetFormInputText(),
      'gender'   => new sfWidgetFormChoice(array('choices' => array('Male' => 'Male', 'Female' => 'Female'))),
      'birthday' => new sfWidgetFormDateTime(),
      'user_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'breed_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Breed'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'name'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'photo'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'gender'   => new sfValidatorChoice(array('choices' => array(0 => 'Male', 1 => 'Female'), 'required' => false)),
      'birthday' => new sfValidatorDateTime(array('required' => false)),
      'user_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
      'breed_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Breed'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dog[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Dog';
  }

}
