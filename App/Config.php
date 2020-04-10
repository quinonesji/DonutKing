<?php

namespace App;

/**
 * Application configuration
 *
 * PHP version 7.0
 */
class Config
{
    // Production MySQL database configuration
    // mysql://b9624e29a9c8c6:4fb6127e@us-cdbr-iron-east-01.cleardb.net/heroku_1369e01860fbd29?reconnect=true

    /**
     * Database host
     * @var string
     */
    const DB_HOST = 'us-cdbr-iron-east-01.cleardb.net';//us-cdbr-iron-east-01.cleardb.net-prod and localhost-dev

    /**
     * Database name
     * @var string
     */
    const DB_NAME = 'heroku_1369e01860fbd29';//heroku_1369e01860fbd29

    /**
     * Database user
     * @var string
     */
    const DB_USER = 'b9624e29a9c8c6';//b9624e29a9c8c6 - prod and app_king-dev

    /**
     * Database password
     * @var string
     */
    const DB_PASSWORD = '4fb6127e';//4fb6127e-prod and J456Kikd#k8@!-dev

    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    const SHOW_ERRORS = false;
}