<?php

namespace A3l\Deployer;

use Symfony\Component\EventDispatcher\Event;

class ReputationLevelDeployer extends AbstractDeployer
{
    protected function attachEvents()
    {
        $this->addListener(static::EVENT_DEPLOY_ON_EXTRACT, array($this,'onExtract'));
    }

    /**
     * onStart event
     * @param Event $event
     */
    protected function onExtract(Event $event)
    {
        $this->output->writeln('<info>Preparing installation</info>');
        copy("{$this->projectDir}/app/config/config.yml.dist", "{$this->projectDir}/app/config/config.yml");
        passthru("composer install");
        unlink("{$this->projectDir}/app/config/config.yml");
    }

}