<?php

/**
 * breed actions.
 *
 * @package    petgroom
 * @subpackage breed
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class breedActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->breeds = Doctrine::getTable('Breed')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new BreedForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new BreedForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($breed = Doctrine::getTable('Breed')->find(array($request->getParameter('id'))), sprintf('Object breed does not exist (%s).', $request->getParameter('id')));
    $this->form = new BreedForm($breed);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($breed = Doctrine::getTable('Breed')->find(array($request->getParameter('id'))), sprintf('Object breed does not exist (%s).', $request->getParameter('id')));
    $this->form = new BreedForm($breed);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($breed = Doctrine::getTable('Breed')->find(array($request->getParameter('id'))), sprintf('Object breed does not exist (%s).', $request->getParameter('id')));
    $breed->delete();

    $this->redirect('breed/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $breed = $form->save();

      $this->redirect('breed/edit?id='.$breed->getId());
    }
  }
}
