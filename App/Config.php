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
    const DB_HOST = 'localhost';//us-cdbr-iron-east-01.cleardb.net

    /**
     * Database name
     * @var string
     */
    const DB_NAME = 'DonutKing';//heroku_1369e01860fbd29

    /**
     * Database user
     * @var string
     */
    const DB_USER = 'app_king';//b9624e29a9c8c6

    /**
     * Database password
     * @var string
     */
    const DB_PASSWORD = 'J456Kikd#k8@!';//4fb6127e

    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    const SHOW_ERRORS = false;
}