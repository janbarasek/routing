<?php

/**
 * Test: Nette\Routing\Route first optional parameter.
 */

declare(strict_types=1);

use Nette\Routing\Route;


require __DIR__ . '/../bootstrap.php';


$route = new Route('<presenter>/<action>/<id \d{1,3}>', [
	'presenter' => 'default',
	'id' => null,
]);

testRouteIn($route, '/presenter/action/12/any');

testRouteIn($route, '/presenter/action/12/', [
	'presenter' => 'presenter',
	'action' => 'action',
	'id' => '12',
	'test' => 'testvalue',
], '/presenter/action/12?test=testvalue');

testRouteIn($route, '/presenter/action/12', [
	'presenter' => 'presenter',
	'action' => 'action',
	'id' => '12',
	'test' => 'testvalue',
], '/presenter/action/12?test=testvalue');

testRouteIn($route, '/presenter/action/1234');

testRouteIn($route, '/presenter/action/', [
	'presenter' => 'presenter',
	'action' => 'action',
	'id' => null,
	'test' => 'testvalue',
], '/presenter/action/?test=testvalue');

testRouteIn($route, '/presenter/action', [
	'presenter' => 'presenter',
	'action' => 'action',
	'id' => null,
	'test' => 'testvalue',
], '/presenter/action/?test=testvalue');

testRouteIn($route, '/presenter/', null);

testRouteIn($route, '/presenter', null);

testRouteIn($route, '/');
