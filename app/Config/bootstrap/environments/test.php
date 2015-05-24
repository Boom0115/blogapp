<?php
/**
 * Created by PhpStorm.
 * User: takahashi
 * Date: 2015/05/24
 * Time: 1:05
 */

Environment::configure('test', true, [
    'MYSQL_DB_HOST' => 'localhost',
    'MYSQL_USERNAME' => 'webapp',
    'MYSQL_PASSWORD' => 'password',
    'MYSQL_DB_NAME' => 'test_blog',
    'MYSQL_TEST_DB_NAME' => 'test_blog',
    'MYSQL_PREFIX' => '',
]);