<?php

/**
 * StackendCategoryContribution
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    stackend
 * @subpackage model
 * @author     Thapelo Tsotetsi
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class StackendCategoryContribution extends BaseStackendCategoryContribution
{
	public function getActiveJobs($max = 10)
{
  $q = Doctrine_Query::create()
    ->from('StackendContribution j')
    ->where('j.category_id = ?', $this->getId())
    ->limit($max);
 
  return Doctrine_Core::getTable('StackendContribution')->getActiveJobs($q);
}
	
public function getSlug()
{
  return Stackend::slugify($this->getName());
}
	
	
public function countActiveJobs()
{
  $q = Doctrine_Query::create()
    ->from('StackendContribution j')
    ->where('j.category_id = ?', $this->getId());
 
  return Doctrine_Core::getTable('StackendContribution')->countActiveJobs($q);
}	
	
}
