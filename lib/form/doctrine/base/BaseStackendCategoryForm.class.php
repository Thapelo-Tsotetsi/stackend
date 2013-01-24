<?php

/**
 * StackendCategory form base class.
 *
 * @method StackendCategory getObject() Returns the current form's model object
 *
 * @package    stackend
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseStackendCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'name'                     => new sfWidgetFormInputText(),
      'created_at'               => new sfWidgetFormDateTime(),
      'updated_at'               => new sfWidgetFormDateTime(),
      'slug'                     => new sfWidgetFormInputText(),
      'stackend_affiliates_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'StackendAffiliate')),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                     => new sfValidatorString(array('max_length' => 255)),
      'created_at'               => new sfValidatorDateTime(),
      'updated_at'               => new sfValidatorDateTime(),
      'slug'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'stackend_affiliates_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'StackendAffiliate', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'StackendCategory', 'column' => array('name'))),
        new sfValidatorDoctrineUnique(array('model' => 'StackendCategory', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('stackend_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'StackendCategory';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['stackend_affiliates_list']))
    {
      $this->setDefault('stackend_affiliates_list', $this->object->StackendAffiliates->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveStackendAffiliatesList($con);

    parent::doSave($con);
  }

  public function saveStackendAffiliatesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['stackend_affiliates_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->StackendAffiliates->getPrimaryKeys();
    $values = $this->getValue('stackend_affiliates_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('StackendAffiliates', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('StackendAffiliates', array_values($link));
    }
  }

}
