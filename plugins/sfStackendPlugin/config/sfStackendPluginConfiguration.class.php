<?php 
class sfStackendPluginConfiguration extends sfPluginConfiguration
{
  public function initialize()
  {
    $this->dispatcher->connect('user.method_not_found', array('StackendUser', 'methodNotFound'));
  }
}
