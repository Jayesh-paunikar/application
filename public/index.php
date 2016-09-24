<?php
/**
 *
 */
//declare(strict_types = 1);

use Mvc5\Web;

/**
 *
 */
$memoryUsage = memory_get_usage();

/**
 *
 */
include __DIR__ . '/../init.php';

/**
 *
 */
call_user_func(new Web(include __DIR__ . '/../config/config.php', null, true));

/**
 *
 */
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
    return;
}

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
