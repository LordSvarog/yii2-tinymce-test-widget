TinyMCE Widget для Yii2
===================
Виджет для отрисовки [TinyMCE WYSIWYG text editor plugin](http://www.tinymce.com/) .

##Установка
Предпочтительным способом установки данного расширения является использование [Composer](http://getcomposer.org/download/) .

Выполнить команду

```bash
php composer.phar require lord_svarog/yii2-tinymce-widget:^1.0.0
```

или добавить в секцию `require` файла `composer.json` Вашего приложения следующую запись

```bash
"lord_svarog/yii2-tinymce-widget" : "^1.0.0"
```

##Простое использование

```php
use developeruz\tinyMce\TinyMce;

    echo TinyMce::widget( [
            'name' => 'content',
            'options' => ['rows' => 6], // параметры передаваемые в Html::textarea
            'clientOptions' => [        // параметры передаваемые в tinymce.init()
                'language' => 'ru',
            ],
        ]);
    ?>
```

##Использование c ActiveForm

```php
use developeruz\tinyMce\TinyMce;

    echo $form->field($model, 'content')->widget(TinyMce::className(), [
        'options' => ['rows' => 6], // параметры передаваемые в Html::textarea
        'clientOptions' => [        // параметры передаваемые в tinymce.init()
            'language' => 'ru',
        ],
    ]);
```
