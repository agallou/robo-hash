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
        return $this->task(Task\Hash::class, $file);
    }
}
