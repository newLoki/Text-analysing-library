<?php
/**
 * Created by JetBrains PhpStorm.
 * User: albertoassmann
 * Date: 25.06.11
 * Time: 18:09
 * To change this template use File | Settings | File Templates.
 */

defined('ROOT_PATH')
    || define('ROOT_PATH', realpath(__DIR__ . '/../'));

defined('LIBRARY_PATH')
    || define('LIBRARY_PATH', realpath(__DIR__ . '/../Library/'));

defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'testing'));

defined('TEST_PATH')
    || define('TEST_PATH', realpath(__DIR__));

set_include_path(
    implode(
        PATH_SEPARATOR,
        array(
            LIBRARY_PATH,
            get_include_path(),
        )
    )
);
