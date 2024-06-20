<header id="header">
    <?php

    use yii\bootstrap5\Nav;
    use yii\bootstrap5\NavBar;

    NavBar::begin([
        'brandLabel' => 'Контрольная панель',
        'brandUrl'   => '/cpanel',
        'options'    => ['class' => 'navbar-expand-md navbar-dark bg-dark sticky-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            [
                'label' =>'Пользователи', 'url' => ['#'],
                'items' => [
                    ['label' => 'Все пользователи', 'url' => ['/cpanel/user']],
                    ['label' => 'Добавить пользователя', 'url' => ['/cpanel/user/create']],
                ],
            ],
            [
                'label' =>'Компании', 'url' => ['#'],
                'items' => [
                    ['label' => 'Категории компаний', 'url' => ['/cpanel/category-company']],
                    ['label' => 'Добавить категорию', 'url' => ['/cpanel/category-company/create']],
                    ['label' => 'Все компании', 'url' => ['/cpanel/company']],
                    ['label' => 'Добавить новую', 'url' => ['/cpanel/company/create']],
                ],
            ],
            [
                'label' =>'Отзывы', 'url' => ['#'],
                'items' => [
                    ['label' => 'Категории компаний', 'url' => ['/cpanel/category-company']],
                    ['label' => 'Добавить категорию', 'url' => ['/cpanel/category-company/create']],
                    ['label' => 'Все компании', 'url' => ['/cpanel/company']],
                    ['label' => 'Добавить новую', 'url' => ['/cpanel/company/create']],
                ],
            ],
        ],
    ]);
    NavBar::end();
    ?>
</header>
