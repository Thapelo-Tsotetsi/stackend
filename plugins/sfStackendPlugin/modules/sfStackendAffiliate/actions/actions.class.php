<?php

/**
 * affiliate actions.
 *
 * @package    stackend
 * @subpackage affiliate
 * @author     Tsotetsi Thapelo
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfStackendAffiliateActions extends sfActions
{

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new StackendAffiliateForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new StackendAffiliateForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }


  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $stackend_affiliate = $form->save();

      $this->redirect($this->generateUrl('affiliate_wait', $stackend_affiliate));
    }
  }
  
	public function executeWait(sfWebRequest $request)
	{
	}
}
