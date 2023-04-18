<?php
return [
		'home_port_count' => 5,
        'theme' => env('THEME','default'),
		'home_articles_count' => 3,
		'paginate' => 3,
        'paginate_gl' => 5,
        'paginate_possite' => 30,
        'paginate_article' => 8,
		'recent_comments' => 3,
		'recent_portfolios' => 3,
		'other_portfolios' => 8,
		'articles_img' => [
    'max' => ['width'=>816,'height'=>282],
    'mini' => ['width'=>55,'height'=>55]
],
    'portfolios_img' => [
        'max' => ['width'=>816,'height'=>282],
        'mini' => ['width'=>181,'height'=>134]
    ],
	'image_portfolios' => [
    'width'=>1024,
    'height'=>968
],
    'image_articles' => [
        'width'=>1024,
        'height'=>768
    ],
];