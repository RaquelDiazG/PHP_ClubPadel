<?php // config/bootstrap.php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/config.php';


function GetEntityManager()
{
    $namespaces = array(
        __DIR__ . '/../config/yaml' => 'AppBundle\Entity',
        //    '/path/to/files' => 'Project\Entities'
    );

    // $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode);
    // $config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
    // $config = Setup::createYAMLMetadataConfiguration($paths, $isDevMode);
    $config = new Doctrine\ORM\Configuration;
    $driverImpl = new Doctrine\ORM\Mapping\Driver\SimplifiedYamlDriver($namespaces);
    $config->setMetadataDriverImpl($driverImpl);
    $config->setQueryCacheImpl(new \Doctrine\Common\Cache\ArrayCache());
    $config->setProxyDir(DOCTRINE_PROXY_DIR);
    $config->setProxyNamespace(DOCTRINE_PROXY_NAMESPACE);

    // the connection configuration
    $dbParams = array(
        'driver'   => MYSQL_DRIVER,
        'host'     => MYSQL_HOST,
        'port'     => MYSQL_PORT,
        'user'     => MYSQL_USER,
        'password' => MYSQL_PASSWORD,
        'dbname'   => MYSQL_SCHEMA_NAME
    );

    return Doctrine\ORM\EntityManager::create($dbParams, $config);
}