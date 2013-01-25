<?php
class StackendTestFunctional extends sfTestFunctional
{
  public function loadData()
  {
    Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/fixtures');
 
    return $this;
  }
 
  public function getMostRecentProgrammingJob()
  {
    $q = Doctrine_Query::create()
      ->select('j.*')
      ->from('StackendJob j')
      ->leftJoin('j.StackendCategory c')
      ->where('c.slug = ?', 'programming');
    $q = Doctrine_Core::getTable('StackendJob')->addActiveJobsQuery($q);
 
    return $q->fetchOne();
  }
 
  public function getExpiredJob()
  {
    $q = Doctrine_Query::create()
      ->from('StackendJob j')
      ->where('j.expires_at < ?', date('Y-m-d', time()));
 
    return $q->fetchOne();
  }
}
