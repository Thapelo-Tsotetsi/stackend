<?php

/**
 * StackendAffiliate form.
 *
 * @package    stackend
 * @subpackage form
 * @author     Thapelo Tsotetsi
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginStackendAffiliateForm extends BaseStackendAffiliateForm
{
  public function setup()
  {
	parent::setup();

    $this->useFields(array(
      'url', 
      'email', 
      'stackend_categories_list'
    ));
    $this->widgetSchema['stackend_categories_list']->setOption('expanded', true);
    $this->widgetSchema['stackend_categories_list']->setLabel('Categories');
 
    $this->validatorSchema['stackend_categories_list']->setOption('required', true);
 
    $this->widgetSchema['url']->setLabel('Your website URL');
    $this->widgetSchema['url']->setAttribute('size', 50);
 
    $this->widgetSchema['email']->setAttribute('size', 50);
 
    $this->validatorSchema['email'] = new sfValidatorEmail(array('required' => true));
  }
}
