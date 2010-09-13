<?php

/**
 * Appointment form base class.
 *
 * @method Appointment getObject() Returns the current form's model object
 *
 * @package    petgroom
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAppointmentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'start'   => new sfWidgetFormDateTime(array('date' =>array('format'=>'%day% - %month% - %year%'))),
      'end'     => new sfWidgetFormDateTime(array('date' =>array('format'=>'%day% - %month% - %year%'))),
      'title'   => new sfWidgetFormInputText(),
      'info'    => new sfWidgetFormTextarea(),
      'dog_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Dog'), 'add_empty' => true)),
      'user_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'start'   => new sfValidatorDateTime(),
      'end'     => new sfValidatorDateTime(),
      'title'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'info'    => new sfValidatorString(array('max_length' => 2500, 'required' => false)),
      'dog_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Dog'), 'required' => false)),
      'user_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('appointment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Appointment';
  }

}
