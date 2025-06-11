<?php

namespace Octava\Bundle\JobQueueBundle\Command;

use JMS\JobQueueBundle\Command\RunCommand as BaseRunCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Octava\Bundle\JobQueueBundle\Config;

/**
 * Class RunCommand
 * @package Octava\Bundle\JobQueueBundle\Command
 */
class RunCommand extends BaseRunCommand
{
    /**
     * @var Config
     */
    protected $config;

    public function run(InputInterface $input, OutputInterface $output)
    {
        $input->setOption(
            'queue',
            $this->config->getRestrictedQueues()
        );

        return parent::execute($input, $output);
    }

    protected function configure()
    {
        parent::configure();
        $this->setName('octava-job-queue:run');
    }

    public function setConfig(Config $config)
    {
        $this->config = $config;
    }
}
