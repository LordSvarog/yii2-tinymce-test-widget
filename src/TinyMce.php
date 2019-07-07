<?php
/**
 * @see based on https://github.com/2amigos/yii2-tinymce-widget
 * @see based on https://github.com/developeruz/yii2-tinymce-widget
 */
namespace lord_svarog\tinymce;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;
/**
 *
 * TinyMCE renders a tinyMCE js plugin for WYSIWYG editing.
 *
 * @author Ilya Karsakov <kars.energy@ya.ru>
 */
class TinyMce extends InputWidget
{
  /**
   * @var array the options for the TinyMCE JS plugin.
   * Please refer to the TinyMCE JS plugin Web page for possible options.
   * @see http://www.tinymce.com/wiki.php/Configuration
   */
  public $clientOptions = [];
  /**
   * @var bool whether to set the on change event for the editor. This is required to be able to validate data.
   */
  public $triggerSaveOnBeforeValidateForm = true;
  /**
   * @inheritdoc
   */
  public function run()
  {
    if ($this->hasModel()) {
      echo Html::activeTextarea($this->model, $this->attribute, $this->options);
    } else {
      echo Html::textarea($this->name, $this->value, $this->options);
    }
    $this->registerClientScript();
  }
  /**
   * Registers tinyMCE js plugin
   */
  protected function registerClientScript()
  {
    $js = [];

    $view = $this->getView();
    TinyMceAsset::register($view);

    $id = $this->options['id'];
    $this->clientOptions['selector'] = "#{$id}";

    $options = Json::encode($this->clientOptions);
    $js[] = "tinymce.remove('#$id');tinymce.init($options);";

    if ($this->triggerSaveOnBeforeValidateForm) {
      $js[] = "$('#{$id}').parents('form').on('beforeValidate', function() { tinymce.triggerSave(); });";
    }

    $view->registerJs(implode("\n", $js));
  }
}