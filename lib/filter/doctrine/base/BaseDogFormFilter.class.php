<?php

/**
 * Dog filter form base class.
 *
 * @package    petgroom
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDogFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'     => new sfWidgetFormFilterInput(),
      'photo'    => new sfWidgetFormFilterInput(),
      'gender'   => new sfWidgetFormChoice(array('choices' => array('' => '', 'Male' => 'Male', 'Female' => 'Female'))),
      'birthday' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'user_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'breed_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Breed'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'     => new sfValidatorPass(array('required' => false)),
      'photo'    => new sfValidatorPass(array('required' => false)),
      'gender'   => new sfValidatorChoice(array('required' => false, 'choices' => array('Male' => 'Male', 'Female' => 'Female'))),
      'birthday' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'user_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'breed_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Breed'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('dog_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Dog';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'name'     => 'Text',
      'photo'    => 'Text',
      'gender'   => 'Enum',
      'birthday' => 'Date',
      'user_id'  => 'ForeignKey',
      'breed_id' => 'ForeignKey',
    );
  }
}
