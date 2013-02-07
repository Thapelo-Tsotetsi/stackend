<?php

/**
 * StackendAffiliate form base class.
 *
 * @method StackendAffiliate getObject() Returns the current form's model object
 *
 * @package    stackend
 * @subpackage form
 * @author     Thapelo Tsotetsi
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseStackendAffiliateForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'url'                      => new sfWidgetFormInputText(),
      'email'                    => new sfWidgetFormInputText(),
      'token'                    => new sfWidgetFormInputText(),
      'is_active'                => new sfWidgetFormInputCheckbox(),
      'created_at'               => new sfWidgetFormDateTime(),
      'updated_at'               => new sfWidgetFormDateTime(),
      'stackend_categories_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'StackendCategory')),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'url'                      => new sfValidatorString(array('max_length' => 255)),
      'email'                    => new sfValidatorString(array('max_length' => 255)),
      'token'                    => new sfValidatorString(array('max_length' => 255)),
      'is_active'                => new sfValidatorBoolean(array('required' => false)),
      'created_at'               => new sfValidatorDateTime(),
      'updated_at'               => new sfValidatorDateTime(),
      'stackend_categories_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'StackendCategory', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'StackendAffiliate', 'column' => array('email')))
    );

    $this->widgetSchema->setNameFormat('stackend_affiliate[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'StackendAffiliate';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['stackend_categories_list']))
    {
      $this->setDefault('stackend_categories_list', $this->object->StackendCategories->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveStackendCategoriesList($con);

    parent::doSave($con);
  }

  public function saveStackendCategoriesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['stackend_categories_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->StackendCategories->getPrimaryKeys();
    $values = $this->getValue('stackend_categories_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('StackendCategories', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('StackendCategories', array_values($link));
    }
  }

}
