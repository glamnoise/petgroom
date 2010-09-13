<?php

/**
 * appointment actions.
 *
 * @package    petgroom
 * @subpackage appointment
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class appointmentActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->appointments = Doctrine::getTable('Appointment')
      ->createQuery('a')
      ->execute();
  
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AppointmentForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AppointmentForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($appointment = Doctrine::getTable('Appointment')->find(array($request->getParameter('id'))), sprintf('Object appointment does not exist (%s).', $request->getParameter('id')));
    $this->form = new AppointmentForm($appointment);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($appointment = Doctrine::getTable('Appointment')->find(array($request->getParameter('id'))), sprintf('Object appointment does not exist (%s).', $request->getParameter('id')));
    $this->form = new AppointmentForm($appointment);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($appointment = Doctrine::getTable('Appointment')->find(array($request->getParameter('id'))), sprintf('Object appointment does not exist (%s).', $request->getParameter('id')));
    $appointment->delete();

    $this->redirect('appointment/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $appointment = $form->save();

      $this->redirect('appointment/edit?id='.$appointment->getId());
    }
  }



/**
 *
 * @extdirect-enable
 * @extdirect-len 1
 */
public function executeDirectNew()
{
  	$form = new AppointmentForm();
  	$form->disableCSRFProtection();

  	$appointment = new Appointment();
  	$appointment->start = $this->getRequestParameter('start');
  	$appointment->end = $this->getRequestParameter('end');
  	$appointment->title = $this->getRequestParameter('title');
  	//$appointment->allDay = $this->getRequestParameter('isAllday');
  	$appointment->info = $this->getRequestParameter('info');

  	$aEvent = $appointment->toArray();
        $aEvent[ $form->getCSRFFieldName() ] = $form->getCSRFToken("your key here from settings.yml");

  	$form->bind( $aEvent );

  	if( $form->isValid() )
        {
      	        $appointment = $form->save();
      	        $this->result = $appointment->getPrimaryKey();
        }
        else
        {
    	        $this->result = $form->getGlobalErrors();
        }

  	return sfView::SUCCESS;
}



}
