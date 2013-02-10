<?php

/**
 * contribution actions.
 *
 * @package    stackend
 * @subpackage contribution
 * @author     Thapelo Tsotetsi
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contributionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  //  $this->stackend_contributions = Doctrine_Core::getTable('StackendContribution')
   //   ->createQuery('a')
    //  ->execute();
     		
	//$this->stackend_contributions = Doctrine_Core::getTable('StackendContribution')->getActiveJobs();
	$this->categories = Doctrine_Core::getTable('StackendCategoryContribution')->getWithJobs();
	
  
  }

  public function executeShow(sfWebRequest $request)
  {
    //$this->contribution = Doctrine_Core::getTable('StackendContribution')->find(array($request->getParameter('id')));
    //$this->forward404Unless($this->contribution);
    $this->contribution = $this->getRoute()->getObject();

  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new StackendContributionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new StackendContributionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($stackend_contribution = Doctrine_Core::getTable('StackendContribution')->find(array($request->getParameter('id'))), sprintf('Object stackend_contribution does not exist (%s).', $request->getParameter('id')));
    $this->form = new StackendContributionForm($stackend_contribution);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($stackend_contribution = Doctrine_Core::getTable('StackendContribution')->find(array($request->getParameter('id'))), sprintf('Object stackend_contribution does not exist (%s).', $request->getParameter('id')));
    $this->form = new StackendContributionForm($stackend_contribution);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($stackend_contribution = Doctrine_Core::getTable('StackendContribution')->find(array($request->getParameter('id'))), sprintf('Object stackend_contribution does not exist (%s).', $request->getParameter('id')));
    $stackend_contribution->delete();

    $this->redirect('contribution/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $stackend_contribution = $form->save();

      $this->redirect('contribution/edit?id='.$stackend_contribution->getId());
    }
  }
}
