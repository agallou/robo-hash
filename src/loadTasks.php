<?php
namespace Agallou\RoboHash;

trait loadTasks
{
    /**
     * @param string $file
     *
     * @return RobotHash
     */
    protected function taskHash($file)
    {
        return new Task\RobotHash($file);
    }
}
