<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);

$this->beginPage();

?>
    <!DOCTYPE html>
    <html lang="<?php echo Yii::$app->language ?>" class="h-100">
    <head>
        <title>
            <?php echo Html::encode($this->title) ?>
        </title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php
    $this->beginBody();
    $this->beginContent('@app/modules/cpanel/views/layouts/header.php', [$content]);
    $this->endContent();

    if (!empty($this->params['breadcrumbs'])) {
        echo Breadcrumbs::widget([
            'homeLink'     => ['label' => 'Cpanel', 'url' => '/cpanel'],
            'links'        => $this->params['breadcrumbs'],
            'itemTemplate' => "<li class=\"breadcrumb-item\">{link}</li>\n",
            'options'      => ['class' => 'text-bg-light p-3',],
        ]);
    }
    ?>
    <main class="container-fluid">
        <div class="row">
            <div class="d-none d-lg-block col-2 text-left">
                <div class="list-group list-group-flush my-3">
                    <a href="/cpanel/user" class="list-group-item list-group-item-secondary">Пользователи</a>
                    <a href="/cpanel/user/create" class="list-group-item">Добавить пользователя</a>
                </div>

                <div class="list-group list-group-flush mb-3">
                    <a href="/cpanel/company" class="list-group-item list-group-item-secondary">Компании</a>
                    <a href="/cpanel/company/create" class="list-group-item">Добавить компанию</a>
                </div>

                <div class="list-group list-group-flush mb-3">
                    <a href="/cpanel/category-company" class="list-group-item list-group-item-secondary">Категории</a>
                    <a href="/cpanel/category-company/create" class="list-group-item">Добавить категорию</a>

                </div>

                <div class="list-group list-group-flush mb-3">
                    <a href="/cpanel/comment" class="list-group-item list-group-item-secondary">Комментарии</a>
                    <a href="/cpanel/comment/create" class="list-group-item">Добавить комментарий</a>

                </div>
            </div>
            <div class="col-10">
                <?php echo $content; ?>
            </div>
        </div>
    </main>
    <?php
    $this->beginContent('@app/modules/cpanel/views/layouts/footer.php');
    $this->endContent();
    $this->endBody();
    ?>
    </body>
    </html>
<?php
$this->endPage();
