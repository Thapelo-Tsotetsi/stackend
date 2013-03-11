<?php

/**
 * StackendCategoryAffiliate form base class.
 *
 * @method StackendCategoryAffiliate getObject() Returns the current form's model object
 *
 * @package    stackend
 * @subpackage form
 * @author     Thapelo Tsotetsi
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseStackendCategoryAffiliateForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'category_id'  => new sfWidgetFormInputHidden(),
      'affiliate_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'category_id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('category_id')), 'empty_value' => $this->getObject()->get('category_id'), 'required' => false)),
      'affiliate_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('affiliate_id')), 'empty_value' => $this->getObject()->get('affiliate_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('stackend_category_affiliate[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'StackendCategoryAffiliate';
  }

}
