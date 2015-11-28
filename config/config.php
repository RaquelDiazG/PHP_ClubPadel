<?php

// src/config.php

/**
 * MySQL Config
 */
define('MYSQL_HOST', '127.0.0.1');
define('MYSQL_PORT', 3306);
define('MYSQL_DRIVER', 'pdo_mysql');
define('MYSQL_USER', 'miw_padel15');
define('MYSQL_PASSWORD', '*miw_padel15*');
define('MYSQL_SCHEMA_NAME', 'miw_padel15');

/**
 * Doctrine Proxy
 */
define('DOCTRINE_PROXY_DIR', '\xampp\tmp');
define('DOCTRINE_PROXY_NAMESPACE', 'MiW\Padel15\Proxies');
