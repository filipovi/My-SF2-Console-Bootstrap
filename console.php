<?php
/*
 * This file is part of the Symfony CLI Bootstrap
 *
 * (c) Pascal Filipovicz <pascal.filipovicz@frozenk.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
require_once __DIR__.'/src/autoload.php';

use Symfony\Component\Console as Console;

$application = new Console\Application('sf2-cli-base', '0.1');
$application->add(new CliBase\Command\CliBaseCommand('hello-world'));
$application->run();
