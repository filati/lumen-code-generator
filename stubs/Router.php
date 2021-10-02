<?php
$router->group(['prefix' => 'DummyTable', 'as' => 'admin.DummyTable'], function () use ($router) {
    $router->get('', ['as' => 'admin.DummyTable.list', 'uses' => 'Admin\DummysController@list']);
    $router->get('{uuid}', ['uses' => 'Admin\DummysController@list']);
    $router->post('', ['as' => 'admin.DummyTable.create', 'uses' => 'Admin\DummysController@create']);
    $router->patch('', ['as' => 'admin.DummyTable.update', 'uses' => 'Admin\DummysController@update']);
    $router->delete('{uuid}', ['as' => 'admin.DummyTable.delete', 'uses' => 'Admin\DummysController@delete']);
});
