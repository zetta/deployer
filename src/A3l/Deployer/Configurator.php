<?php

namespace A3l\Deployer;

use Symfony\Component\Yaml\Yaml;

class Configurator
{

    const FILE_NAME = 'app/config/application.yml';

    protected $config;

    /**
     * Class Constructor
     * @param string $filename
     */
    public function __construct($filename = Configurator::FILE_NAME)
    {
        echo getcwd(), "\n";
        $this->config = Yaml::parse($filename);
    }

    /**
     * Return entire config file
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Is the project defined?
     * @param string $name
     * @return boolean
     */
    public function hasProject($name)
    {
        return isset($this->config['projects'][$name]);
    }

    /**
     * Returns project configuration
     * @param string name
     * @return array
     */
    public function getProjectConfiguration($name)
    {
        return $this->config['projects'][$name];
    }

}