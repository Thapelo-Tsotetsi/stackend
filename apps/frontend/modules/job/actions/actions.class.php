<?php

/**
 * job actions.
 *
 * @package    stackend
 * @subpackage job
 * @author     Tsotetsi Thapelo
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class jobActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
	$this->categories = Doctrine_Core::getTable('StackendCategory')->getWithJobs();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->job = $this->getRoute()->getObject();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new StackendJobForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new StackendJobForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($stackend_job = Doctrine_Core::getTable('StackendJob')->find(array($request->getParameter('id'))), sprintf('Object stackend_job does not exist (%s).', $request->getParameter('id')));
    $this->form = new StackendJobForm($stackend_job);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($stackend_job = Doctrine_Core::getTable('StackendJob')->find(array($request->getParameter('id'))), sprintf('Object stackend_job does not exist (%s).', $request->getParameter('id')));
    $this->form = new StackendJobForm($stackend_job);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($stackend_job = Doctrine_Core::getTable('StackendJob')->find(array($request->getParameter('id'))), sprintf('Object stackend_job does not exist (%s).', $request->getParameter('id')));
    $stackend_job->delete();

    $this->redirect('job/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $stackend_job = $form->save();

      $this->redirect('job/edit?id='.$stackend_job->getId());
    }
  }
}
