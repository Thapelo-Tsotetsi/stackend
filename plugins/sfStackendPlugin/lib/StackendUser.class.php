<?php 
class StackendUser
{
  static public function methodNotFound(sfEvent $event)
  {
    if (method_exists('StackendUser', $event['method']))
    {
      $event->setReturnValue(call_user_func_array(
        array('StackendUser', $event['method']),
        array_merge(array($event->getSubject()), $event['arguments'])
      ));
 
      return true;
    }
  }
 
  static public function isFirstRequest(sfUser $user, $boolean = null)
  {
    if (is_null($boolean))
    {
      return $user->getAttribute('first_request', true);
    }
    else
    {
      $user->setAttribute('first_request', $boolean);
    }
  }
 
  static public function addJobToHistory(sfUser $user, StackendJob $job)
  {
    $ids = $user->getAttribute('job_history', array());
 
    if (!in_array($job->getId(), $ids))
    {
      array_unshift($ids, $job->getId());
      $user->setAttribute('job_history', array_slice($ids, 0, 3));
    }
  }
 
  static public function getJobHistory(sfUser $user)
  {
    $ids = $user->getAttribute('job_history', array());
 
    if (!empty($ids))
    {
      return Doctrine_Core::getTable('StackendJob')
        ->createQuery('a')
        ->whereIn('a.id', $ids)
        ->execute();
    }
 
    return array();
  }
 
  static public function resetJobHistory(sfUser $user)
  {
    $user->getAttributeHolder()->remove('job_history');
  }

}
