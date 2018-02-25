<?php

namespace frontend\widgets;

use common\models\Category;
use yii\helpers\Url;
use Yii;
use frontend\helpers\Helper;

class MegaMenu extends \yii\base\Widget
{
    public $countmenu = 0;
    public $numberMenuShow = 12;
    public $countColumnSubMenu = 0;
    public $html = '';

    public function renderSubMenu($categories, $parent_id = Category::ROOT_CATEGORY_SIGNAL, $html = '', $level = 0)
    {
        $cate_child = array();
        foreach ($categories as $key => $item)
        {
            if ($item['parent'] == $parent_id)
            {
                $cate_child[] = $item;
                unset($categories[$key]);
            }
        }

        if ($cate_child)
        {
            if ($level == 1) {
                $this->html .= '<ul class="cd-secondary-dropdown is-hidden" itemscope itemtype="http://www.schema.org/SiteNavigationElement">';
            } else if ($level == 2) {
                $this->html .= ' <ul class="is-hidden">';
            }

            foreach ($cate_child as $key => $item)
            {
                $url = Helper::urlDetail('/category/index', $item['_id'], $item['slug']);

                if ($level == 0) {
                    if(++$this->countmenu > $this->numberMenuShow){
                        $this->html .= ' <li class="has-children"><a href="'.Url::to(['category-list']).'"><b>' . Yii::t('app', 'Xem tất cả danh mục') . '</b></a>';
                        break;
                    }
                    $this->html .= '<li class="has-children"><a href="' . $url . '"><span class="title">' . $item['name'] . '</span></a>';
                } else if ($level == 1) {
                    $this->html .= '<li class="has-children submenu2"><a itemprop="url" href="' . $url . '"><span itemprop="name">' . $item['name'] . '</span></a>';
                } else if ($level == 2) {
                    $this->html .= '<li><a href="' . $url . '">' . $item['name'] . '</a>';
                }

                $levelUp = $level + 1;

                $this->renderSubMenu($categories, (string)$item['_id'], $this->html, $levelUp);

                if ($level == 0) {
                    $this->html .= '</li>';
                    $this->countColumnSubMenu = 0;
                } else if($level == 1){
                    if(++$this->countColumnSubMenu > 3) {
                        $this->html .= '</li><span class="clearfix"></span>';
                        $this->countColumnSubMenu = 0;
                    } else {
                        $this->html .= '</li>';
                    }
                } else if ($level > 1) {
                    $this->html .= '</li>';
                }
            }

            if ($level >= 1) {
                $this->html .= '</ul>';
            }

        }
    }

    public function run() {
        $categories = Category::find()
            ->asArray()
            ->all();

        $this->renderSubMenu($categories);

        $renderHtml = '<div class="cd-dropdown-wrapper vertical-menu-wrapper">
                    <a class="cd-dropdown-trigger" href="#"><i class="fa fa-bars" aria-hidden="true"></i>' . Yii::t('app', 'Danh mục sản phẩm') . '</a>
                    <nav class="cd-dropdown">
                        <ul class="cd-dropdown-content">';
        $renderHtml .= $this->html;

        if ($this->countmenu <= $this->numberMenuShow) {
            $renderHtml .= ' <li class="has-children"><a href="' . Url::to(['/category-list']) . '"><b>' . Yii::t('app', 'Xem tất cả danh mục') . '</b></a>';

        }
        $renderHtml .= '</ul></nav></div>';

        return $renderHtml;
    }
}