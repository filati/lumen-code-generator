<?php
$router->group(['prefix' => 'DummyTable', 'as' => 'admin.DummyTable'], function () use ($router) {
    $router->get('', ['as' => 'admin.DummyTable.list', 'uses' => 'Admin\DummyController@list']);
    $router->get('{uuid}', ['uses' => 'Admin\DummyController@list']);
    $router->post('', ['as' => 'admin.DummyTable.create', 'uses' => 'Admin\DummyController@create']);
    $router->patch('', ['as' => 'admin.DummyTable.update', 'uses' => 'Admin\DummyController@update']);
    $router->delete('{uuid}', ['as' => 'admin.DummyTable.delete', 'uses' => 'Admin\DummyController@delete']);
});
