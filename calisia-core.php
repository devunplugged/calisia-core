<?php
/**
 * Plugin Name: calisia-core
 * Author: Tomasz Boroń
 */


define("CALISIA_CORE_ROOT", __DIR__);

define('CALISIA_CORE_URL', plugin_dir_url(__FILE__));
define("CALISIA_CORE_CSS", CALISIA_CORE_URL . 'res/css');
define("CALISIA_CORE_JS", CALISIA_CORE_URL . 'res/js');

require_once CALISIA_CORE_ROOT . '/vendor/autoload.php';


\CalisiaCore\Logger\Logger::log("CalisiaCore init",'debug');
/*
$queryBuilder = new CalisiaCore\db\QueryBuilder();
$results = $queryBuilder
->select('\CalisiaCore\db\models\Users')
->execute();

CalisiaCore\Logger\Logger::log($results, 'tests');*/
