# Widgets for jQuery LoadingOverlay asset


## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

add

```
"bscheshirwork/yii2-jquery-loading-overlay": "@dev"
```

to the require section of your `composer.json` file.



## Usage

@see [jQuery LoadingOverlay](https://gasparesganga.com/labs/jquery-loading-overlay) for possible clientOptions

We can use php notation of clientOptions
```php
<?= \bscheshirwork\jlo\LoadingOverlay::widget([
    'selector' => '#p1',
    'clientOptions' => [
        'image' => '<svg><defs><style>.a{fill:#c5baff;}</style></defs><rect class="a" width="133" height="41"/></svg>',
    ]
]); ?>
```
also we can use js notation
```php
<?= \bscheshirwork\jlo\LoadingOverlay::widget([
    'clientOptions' => <<<JS
{
        image                   : '<svg><defs><style>.a{fill:#c5baff;}</style></defs><rect class="a" width="133" height="41"/></svg>',
        imageAnimation          : "2500ms rotate_right",             // String/Boolean
        imageAutoResize         : true,                              // Boolean
        imageResizeFactor       : 1,                                 // Float
        imageColor              : "#202020",                         // String/Array/Boolean
        imageClass              : "",                                // String/Boolean
        imageOrder              : 1,                                 // Integer
}
JS
]); ?>
```
