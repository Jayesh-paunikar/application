<?php
/**
 *
 */
use Mvc5\Application\App;
use Mvc5\Application\Args;

/**
 *
 */
$memoryUsage = memory_get_usage();

/**
 * Decline static file requests back to the PHP built-in webserver
 */
if (php_sapi_name() === 'cli-server' && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))) {
    return false;
}

/**
 *
 */
include __DIR__ . '/../init.php';

/**
 *
 */
(new App(include __DIR__ . '/../config/config.php'))->call(Args::WEB);

/**
 *
 */
$totalMemory = number_format(memory_get_usage() / 1048576, 3);
$memoryStart = number_format($memoryUsage / 1048576, 3);
$memoryUsed = number_format((memory_get_usage() - $memoryUsage) / 1048576, 3);

$msg = "Total Memory: $totalMemory MB\n"
    . "Memory Start: $memoryStart MB\n"
    . "Memory Usage: $memoryUsed MB\n"
    . "Memory Peak Usage: "
    . number_format(memory_get_peak_usage(true) / 1048576, 3) . " MB\n";

$parseTime = number_format(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'], 3);

$msg .= 'Parse Time: ' . $parseTime . 's = ' . ($parseTime  * 1000) . 'ms';

echo "\n", '<!-- ', $msg, '-->', "\n";
