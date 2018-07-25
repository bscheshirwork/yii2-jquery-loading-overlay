<?php
/**
 * @link https://github.com/bscheshirwork/yii2-jquery-loading-overlay
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace bscheshirwork\jlo;

use yii\base\Widget;
use yii\helpers\Json;

/**
 * A flexible loading overlay
 * For example:
 *
 * ```
 * <?= \bscheshirwork\jlo\LoadingOverlay::widget([
 *      'clientOptions' => [
 *          'image' => '<svg><defs><style>.a{fill:#c5baff;}</style></defs><rect class="a" width="133" height="41"/></svg>',
 *      ]
 *  ]); ?>
 * ```
 *
 * @author BSCheshir <bscheshir.work@gmail.com>
 * @package bscheshirwork\jlo\LoadingOverlay
 */
class LoadingOverlay extends Widget
{
    /**
     * @var array|string the options for the underlying jQuery UI widget.
     * Please refer to the corresponding jQuery LoadingOverlay widget Web page for possible options.
     * @see https://gasparesganga.com/labs/jquery-loading-overlay
     * We can pass php array ['key' => 'value'] to convert it into js object "{key:value}"
     * We can pass string value with pure json "{key:value}" (like a manual).
     */
    public $clientOptions = [];
    /**
     * @var string the DOM element selector.
     * if set use $(selector).LoadingOverlay(action [,options])
     * if not set use $.LoadingOverlay(action [,options])
     */
    public $selector;

    /**
     * Registers a specific jQuery LoadingOverlay widget options
     * Set default options for all future calls to $.LoadingOverlay() and $(selector).LoadingOverlay().
     */
    protected function registerClientOptions()
    {
        if ($this->clientOptions !== false) {
            $options = empty($this->clientOptions) ? '' : (is_array($this->clientOptions) ? Json::htmlEncode($this->clientOptions) : $this->clientOptions);
            $js = "$.LoadingOverlaySetup($options);";
            $this->getView()->registerJs($js);
        }
    }

    public function registerClientScript()
    {
        $selector = empty($this->selector) ? '$' : "$('$this->selector')";
        $js = <<< JS
    $(document).ajaxSend(function(event, jqxhr, settings){
        $selector.LoadingOverlay("show");
    });
    $(document).ajaxComplete(function(event, jqxhr, settings){
        $selector.LoadingOverlay("hide");
    });
JS;
        $this->getView()->registerJs($js);
    }
    /**
     * @inheritdoc
     */
    public function run()
    {
        LoadingOverlayAsset::register($this->getView());
        $this->registerClientScript();
        $this->registerClientOptions();
    }
}
