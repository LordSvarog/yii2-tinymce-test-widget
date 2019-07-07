<?php

namespace lord_svarog\tinymce;

use yii\web\AssetBundle;

class TinyMceAsset extends AssetBundle
{
  public $sourcePath = '@vendor/tinymce/tinymce';

  public $js = [
    'tinymce.min.js'
  ];
}