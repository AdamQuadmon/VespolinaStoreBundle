<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Vespolina\StoreBundle\Process;

use Vespolina\StoreBundle\Process\ProcessInterface;

/**
 * @author Daniel Kucharski <daniel@xerias.be>
 */
abstract class AbstractProcessStep implements ProcessStepInterface
{
    protected $name;
    protected $process;

    public function __construct(ProcessInterface $process)
    {
        $this->process = $process;
    }

    public function getProcess()
    {
        return $this->process;
    }

    protected function getController($class)
    {
        $controller = new $class($this);

        return $controller;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

}