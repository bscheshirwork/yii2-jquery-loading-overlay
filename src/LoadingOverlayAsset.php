<?php
/**
 * @link https://github.com/bscheshirwork/yii2-jquery-loading-overlay
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace bscheshirwork\jlo;

use yii\web\AssetBundle;

/**
 * OverlayAsset asset bundle.
 */
class LoadingOverlayAsset extends AssetBundle
{
    public $sourcePath = '@bower/gasparesganga-jquery-loading-overlay';
    public $depends = [
        'yii\web\JqueryAsset',
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->js[] = YII_DEBUG ? 'dist/loadingoverlay.js' : 'dist/loadingoverlay.min.js';
    }
}
