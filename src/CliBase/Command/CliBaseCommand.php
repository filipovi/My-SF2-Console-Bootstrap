<?php
/*
 * This file is part of the Symfony CLI Bootstrap
 *
 * (c) Pascal Filipovicz <pascal.filipovicz@frozenk.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace CliBase\Command;

use CliBase\Entity\CliBase;

use Symfony\Component\Console as Console;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Configuration as dbConfiguration;

class CliBaseCommand extends Console\Command\Command
{
    private $db;
    private $errors;

    /**
     *  Constuctor : Parameters & Options
     */
    public function __construct($name)
    {
        parent::__construct($name);

        $config = new dbConfiguration();

        $connectionParams = array(
            'driver'    => 'pdo_mysql',
            'host'      => 'localhost',
            'dbname'    => 'DBNAME',
            'user'      => 'LOGIN',
            'password'  => 'PASSWORD',
        );

        $this->setDescription('Command description.');
        $this->setHelp('Command Help.');

        $this->addOption('option-with-value',  '', Console\Input\InputOption::VALUE_OPTIONAL, 'description', 999);
        $this->addOption('option-no-value',    '', Console\Input\InputOption::VALUE_NONE,     'description');

        $this->errors = array();
        $this->db = DriverManager::getConnection($connectionParams, $config);
    }

    /**
     * Execute
     */
    protected function execute(Console\Input\InputInterface $input, Console\Output\OutputInterface $output)
    {
        $clibase = new CliBase();
        $output->writeln('<info>Hello World!</info>');

        if ($value = $input->getOption('option-with-value')) {
            $clibase->setId((int)$value);
            $output->writeln('<info>  option = ' . $clibase->getId() . '</info>');
        }

        if ($input->getOption('option-no-value')) {
            $output->writeln('<info>  with an option</info>');
        }
    }
}
