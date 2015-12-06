<?php

use Cake\Core\Plugin;
use Cake\Routing\Router;

Router::defaultRouteClass('DashedRoute');

Router::scope('/', function ($routes) {
	$routes->connect('/site', ['controller' => 'Sites', 'action' => 'loadScript']);

	$routes->fallbacks('DashedRoute');
});

Plugin::routes();
