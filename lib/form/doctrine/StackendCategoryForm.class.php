<?php

/**
 * StackendCategory form.
 *
 * @package    stackend
 * @subpackage form
 * @author     Thapelo Tsotetsi
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StackendCategoryForm extends BaseStackendCategoryForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at'], $this['stackend_affiliates_list']);
  }
}
