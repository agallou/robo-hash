<?php

namespace Agallou\RoboHash\Task;

use Robo\Task\BaseTask;

class RobotHash extends BaseTask
{

    use \Robo\Task\FileSystem\loadShortcuts;

    /**
     * @var string files
     */
    protected $file;

    /**
     * @var string dst
     */
    protected $dst;

    /**
     * @param string $file
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * set the destination folder
     *
     * @param string $dst
     *
     * @return RobotHash The current instance
     */
    public function to($dst)
    {
        $this->dst = $dst;

        return $this;
    }

    /**
     * @return \Robo\Result
     */
    public function run()
    {
        $this->_rename($this->file, $this->dst . pathinfo($this->file, PATHINFO_FILENAME) . '.' . substr(md5_file($this->file), 0, 8) . '.' . pathinfo($this->file, PATHINFO_EXTENSION));
    }
}
