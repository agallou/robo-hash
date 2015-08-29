<?php
namespace Agallou\RoboHash;

trait loadTasks
{
    /**
     * @param string $file
     *
     * @return RobotHash
     */
    protected function tashHash($file)
    {
        return new Task\RobotHash($file);
    }
}
