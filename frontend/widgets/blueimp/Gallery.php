<?php

namespace frontend\widgets\blueimp;
use yii\helpers\Html;
use frontend\widgets\blueimp\assets\BlueImpAsset;

class Gallery extends \yii\base\Widget {
    public $options = [];
    
    public $renderContent = true;
    
    public $items = [];
    
    public $thumbSize = '200x200';
    
    public $itemOptions = ['style'=>'border:1px solid #ddd;border-radius:3px;padding:3px;margin:auto 3px;display:inline-block;'];
    
    public $tag = 'div';
    
    public function init() {
        if (!isset($options['id'])) {
            $this->options['id'] = $this->getId();
        }
        
        if ($this->renderContent && empty($this->items)) {
            ob_start();
            ob_implicit_flush(false);
        }
    }
    
    public function run() {
        if ($this->renderContent) {
            if(empty($this->items)) {
                $content = trim(ob_get_clean());
            }
            else {
                $content = '';

                foreach ($this->items as $item) {
                    if (is_array($item)) {
                        if (isset($item['thumb'], $item['image'])) {
                            $item['title'] = isset($item['title']) ? $item['title'] : '';
                            $content .= \yii\helpers\Html::tag('a', Html::tag('img', null, ['src' => $item['thumb']]), ['href' => $item['image'], 'title' => $item['title'], 'data-gallery' => ''] + (array)$this->itemOptions);
                        }
                    }
                    elseif (!empty($item)) {
                        $title = basename($item);
                        $content .= \yii\helpers\Html::tag('a', Html::tag('img', null, ['src' => $item]), ['href' => $item, 'title' => $title, 'data-gallery' => ''] + (array)$this->itemOptions);
                    }
                }
            }

            echo Html::tag($this->tag, $content, $this->options);
        }
        
        $this->getView()->registerJs('</script><div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">'
                . '<div class="slides"></div>'
                . '<h3 class="title"></h3>'
                . '<a class="prev">‹</a><a class="next">›</a>'
                . '<a class="play-pause"></a>'
                . '</div><script>', 3, '#blueimp-gallery');
        BlueImpAsset::register($this->getView());
    }
}
