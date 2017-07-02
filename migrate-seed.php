<?php
/**
 * Created by PhpStorm.
 * User: Wilterson
 * Date: 02/07/2017
 * Time: 11:20
 */

exec(__DIR__ . '/vendor/bin/phinx rollback');
exec(__DIR__ . '/vendor/bin/phinx migrate');
exec(__DIR__ . '/vendor/bin/phinx seed:run');