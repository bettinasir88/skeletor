<?php
namespace Skeletor\Frameworks;

class LaravelLumen54Framework extends Framework
{
    public function setup()
    {
        $this->setFramework('laravel/lumen');
        $this->setName("Lumen");
        $this->setVersion("5.4");
    }

    public function configure()
    {
        $this->filesystem->put('PixelFusion.txt', '©PIXELFUSION');
        $this->filesystem->createDir('setup/git-hooks');
    }
}