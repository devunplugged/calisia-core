<?php
/**
 * Plugin Name: calisia-core
 * Author: Tomasz Boroń
 */


define("CALISIA_CORE_ROOT", __DIR__);

require_once CALISIA_CORE_ROOT . '/vendor/autoload.php';


\CalisiaCore\Logger\Logger::log("CalisiaCore init",'debug');
/*
$queryBuilder = new CalisiaCore\db\QueryBuilder();
$results = $queryBuilder
->select('\CalisiaCore\db\models\Users')
->execute();

CalisiaCore\Logger\Logger::log($results, 'tests');*/
