<?php

require_once dirname(__FILE__).'/../lib/contributionGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/contributionGeneratorHelper.class.php';

/**
 * contribution actions.
 *
 * @package    stackend
 * @subpackage contribution
 * @author     Thapelo Tsotetsi
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contributionActions extends autoContributionActions
{
  public function executeListExtend(sfWebRequest $request)
  {
    $job = $this->getRoute()->getObject();
    $job->extend(true);
 
    $this->getUser()->setFlash('notice', 'The selected jobs have been extended successfully.');
 
    $this->redirect('stackend_contribution');
  }

}
