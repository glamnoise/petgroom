<?php

/**
 * User filter form base class.
 *
 * @package    petgroom
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseUserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormFilterInput(),
      'second_name' => new sfWidgetFormFilterInput(),
      'email'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'birthday'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'gender'      => new sfWidgetFormChoice(array('choices' => array('' => '', 'Male' => 'Male', 'Female' => 'Female'))),
      'address'     => new sfWidgetFormFilterInput(),
      'city'        => new sfWidgetFormFilterInput(),
      'cap'         => new sfWidgetFormFilterInput(),
      'phone'       => new sfWidgetFormFilterInput(),
      'cell'        => new sfWidgetFormFilterInput(),
      'info'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorPass(array('required' => false)),
      'second_name' => new sfValidatorPass(array('required' => false)),
      'email'       => new sfValidatorPass(array('required' => false)),
      'birthday'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'gender'      => new sfValidatorChoice(array('required' => false, 'choices' => array('Male' => 'Male', 'Female' => 'Female'))),
      'address'     => new sfValidatorPass(array('required' => false)),
      'city'        => new sfValidatorPass(array('required' => false)),
      'cap'         => new sfValidatorPass(array('required' => false)),
      'phone'       => new sfValidatorPass(array('required' => false)),
      'cell'        => new sfValidatorPass(array('required' => false)),
      'info'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'name'        => 'Text',
      'second_name' => 'Text',
      'email'       => 'Text',
      'birthday'    => 'Date',
      'gender'      => 'Enum',
      'address'     => 'Text',
      'city'        => 'Text',
      'cap'         => 'Text',
      'phone'       => 'Text',
      'cell'        => 'Text',
      'info'        => 'Text',
    );
  }
}
