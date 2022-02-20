<?php

namespace Agallou\RoboHash\Task;

use Robo\Common\BuilderAwareTrait;
use Robo\Task\BaseTask;

class Hash extends BaseTask implements \Robo\Contract\BuilderAwareInterface
{
    //use \Robo\Task\Filesystem\Tasks;
    use BuilderAwareTrait;
    //use \Robo\Task\Filesystem\Shortcuts;

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
     * @return Hash The current instance
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
        $this
            ->collectionBuilder()
            ->taskFilesystemStack()
            ->rename(
                $this->file,
                $this->dst . pathinfo($this->file, PATHINFO_FILENAME) . '.' . substr(md5_file($this->file), 0, 8) . '.' . pathinfo($this->file, PATHINFO_EXTENSION)
            )
            ->run()
        ;
    }
}
