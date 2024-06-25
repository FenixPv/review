<?php

use app\modules\user\models\User;
use yii\grid\DataColumn;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\cpanel\models\SearchUser $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="user-index">
    <div class="d-flex justify-content-between">
        <h1><?php echo Html::encode($this->title) ?></h1>
        <p>
            <?php echo Html::a('Новый пользователь', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            [
                'attribute'      => 'id',
                'contentOptions' => ['style' => 'text-align: center'],
                'headerOptions'  => ['class' => 'text-center', 'width' => '100'],
            ],
            [
                'attribute'     => 'username',
                'headerOptions' => ['class' => 'text-center', 'width' => '200'],
            ],
            'email:email',
            [
                'filter'        => User::getStatusesArray(),
                'attribute'     => 'status',
                'format'        => 'raw',
                'headerOptions' => ['class' => 'text-center', 'width' => '180'],
                'value'         => static function ($model, $key, $index, $column) {
                    /** @var User $model */
                    /** @var DataColumn $column */
                    $value = $model->{$column->attribute};
                    $class = match ($value) {
                        User::STATUS_ACTIVE => 'success',
                        User::STATUS_WAIT => 'warning',
                        default => 'danger',
                    };
                    $html = Html::tag('span',
                        Html::encode($model->getStatusName()),
                        ['class' => 'badge text-bg-' . $class]);
                    return $value === null ? $column->grid->emptyCell : $html;
                }
            ],
            [
                'attribute'     => 'created_at',
                'format'        => ['date', 'php:d-m-Y H:i:s'],
                'contentOptions' => ['style' => 'text-align: right'],
                'headerOptions' => ['class' => 'text-center', 'width' => '100'],
            ],
            [
                'attribute'     => 'updated_at',
                'format'        => ['date', 'php:d-m-Y H:i:s'],
                'contentOptions' => ['style' => 'text-align: right'],
                'headerOptions' => ['class' => 'text-center', 'width' => '100'],
            ],
            [
                'attribute'     => 'avatar',
                'headerOptions' => ['class' => 'text-center', 'width' => '100'],
            ],
            [
                'class'         => ActionColumn::class,
                'contentOptions' => ['style' => 'text-align: center'],
                'headerOptions' => ['class' => 'text-center', 'width' => '100'],
                'urlCreator'    => static function ($action, User $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }

            ],
        ],
    ]) ?>

    <?php Pjax::end(); ?>

</div>
