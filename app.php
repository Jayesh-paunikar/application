#!/usr/bin/env php
<?php
/**
 *
 */

use Mvc5\App;

/**
 *
 */
include __DIR__ . '/init.php';

/**
 *
 */
(new App(include __DIR__ . '/config/config.php'))->call($_SERVER['argv'][1], array_slice($_SERVER['argv'], 2));
