<?php
namespace Skeletor\Manager;

use Skeletor\Frameworks\Exception\FailedToLoadFrameworkException;
use League\Flysystem\Filesystem;

class FrameworkManager
{
    /**
     * @var array with frameworks
     */
    protected $frameworks;

    /**
     * @var instance of the filesystem
     */
    protected $fileSystem;

    public function __construct(Filesystem $fileSystem)
    {
        $this->filesystem = $fileSystem;
    }

    public function addFramework($framework)
    {
        $this->frameworks[] = $framework;
    }

    public function getFrameworkNames()
    {
        return array_map(function($framework) {
            return $framework->getName() . ' ' . $framework->getVersion();
        }, $this->frameworks);
    }

    public function load($name)
    {
        foreach($this->frameworks as $key => $framework) {
            if($framework->getName() . ' ' . $framework->getVersion() === $name) {
                return $framework;
            }
        }

        throw new FailedToLoadFrameworkException('Failed to find framework '.$name);
    }

    public function install($framework)
    {
        $framework->install();
    }

    public function tidyUp($framework)
    {
        $framework->tidyUp($this->filesystem);
    }
}