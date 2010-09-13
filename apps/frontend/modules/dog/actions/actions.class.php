<?php

/**
 * dog actions.
 *
 * @package    petgroom
 * @subpackage dog
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dogActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->dogs = Doctrine::getTable('Dog')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DogForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DogForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($dog = Doctrine::getTable('Dog')->find(array($request->getParameter('id'))), sprintf('Object dog does not exist (%s).', $request->getParameter('id')));
    $this->form = new DogForm($dog);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($dog = Doctrine::getTable('Dog')->find(array($request->getParameter('id'))), sprintf('Object dog does not exist (%s).', $request->getParameter('id')));
    $this->form = new DogForm($dog);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($dog = Doctrine::getTable('Dog')->find(array($request->getParameter('id'))), sprintf('Object dog does not exist (%s).', $request->getParameter('id')));
    $dog->delete();

    $this->redirect('dog/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $dog = $form->save();

      $this->redirect('dog/edit?id='.$dog->getId());
    }
  }
}
