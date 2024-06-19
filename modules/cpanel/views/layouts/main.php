<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
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
echo $content;
$this->beginContent('@app/modules/cpanel/views/layouts/footer.php');
$this->endContent();
$this->endBody();
?>
</body>
</html>
<?php
$this->endPage();
