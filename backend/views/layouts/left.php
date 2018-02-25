<?php
use yii\helpers\Url;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => Yii::t('app', 'Category'),
                        'icon' => 'file',
                        'url' => '#',
                        'items' => [
                            ['label' => Yii::t('app', 'Category Tree'), 'icon' => 'file-code-o', 'url' => Url::to(['category/tree']),],
                            ['label' => Yii::t('app', 'Category List'), 'icon' => 'dashboard', 'url' => Url::to(['category/index']),],
                            ['label' => Yii::t('app', 'Category Create'), 'icon' => 'dashboard', 'url' => Url::to(['category/create']),],
                        ],
                    ],
                    [
                        'label' => Yii::t('app', 'Product'),
                        'icon' => 'file',
                        'url' => '#',
                        'items' => [
                            ['label' => Yii::t('app', 'Product List'), 'icon' => 'dot-circle-o', 'url' => Url::to(['product/index']),],
                            ['label' => Yii::t('app', 'Product Create'), 'icon' => 'dot-circle-o', 'url' => Url::to(['product/create']),],
                        ],
                    ],
                    [
                        'label' => Yii::t('app', 'Link Crawler'),
                        'icon' => 'file',
                        'url' => '#',
                        'items' => [
                            ['label' => Yii::t('app', 'Link List'), 'icon' => 'dot-circle-o', 'url' => Url::to(['link-crawler/index']),],
                            ['label' => Yii::t('app', 'Link Create'), 'icon' => 'dot-circle-o', 'url' => Url::to(['link-crawler/create']),],
                        ],
                    ],
                    [
                        'label' => Yii::t('app', 'Promotion'),
                        'icon' => 'file',
                        'url' => '#',
                        'items' => [
                            ['label' => Yii::t('app', 'Promotion List'), 'icon' => 'dot-circle-o', 'url' => Url::to(['promotion/index']),],
                            ['label' => Yii::t('app', 'Promotion Create'), 'icon' => 'dot-circle-o', 'url' => Url::to(['promotion/create']),],
                        ],
                    ],
                    [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
