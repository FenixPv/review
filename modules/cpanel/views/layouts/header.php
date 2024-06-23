<header id="header">
    <?php

    use yii\bootstrap5\Nav;
    use yii\bootstrap5\NavBar;

    NavBar::begin([
        'innerContainerOptions' => ['class' => 'container-fluid d-lg-block text-center'],
        'brandLabel'       => 'Контрольная панель',
        'brandUrl'         => '/cpanel',
        'options'          => ['class' => 'navbar-expand-lg navbar-dark bg-dark sticky-top'],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav d-block d-lg-none'],
        'items'   => [
            [
                'label' => 'Пользователи', 'url' => ['#'],
                'items' => [
                    ['label' => 'Все пользователи', 'url' => ['/cpanel/user']],
                    ['label' => 'Добавить пользователя', 'url' => ['/cpanel/user/create']],
                ],
            ],
            [
                'label' => 'Компании', 'url' => ['#'],
                'items' => [
                    ['label' => 'Категории компаний', 'url' => ['/cpanel/category-company']],
                    ['label' => 'Добавить категорию', 'url' => ['/cpanel/category-company/create']],
                    ['label' => 'Все компании', 'url' => ['/cpanel/company']],
                    ['label' => 'Добавить новую', 'url' => ['/cpanel/company/create']],
                ],
            ],
            [
                'label' => 'Отзывы', 'url' => ['#'],
                'items' => [
                    ['label' => 'Комментарии', 'url' => ['/cpanel/comment']],
                    ['label' => 'Добавить комментарий', 'url' => ['/cpanel/comment/create']],
                ],
            ],
        ],
    ]);
    NavBar::end();
    ?>
</header>
