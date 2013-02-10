<?php

/**
 * category_contribution actions.
 *
 * @package    stackend
 * @subpackage category_contribution
 * @author     Thapelo Tsotetsi
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class category_contributionActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
 
  public function executeShow(sfWebRequest $request)
  {
    $this->category_contribution = $this->getRoute()->getObject();
    
      $this->pager = new sfDoctrinePager(
    'StackendContribution',
    sfConfig::get('app_max_jobs_on_category')
  );
  $this->pager->setQuery($this->category_contribution->getActiveJobsQuery());
  $this->pager->setPage($request->getParameter('page', 1));
  $this->pager->init();
  }
  
}
