<?php
/**
 * Created by PhpStorm.
 * User: cristian
 * Date: 5/04/18
 * Time: 17:20
 */

namespace App\Event;

use App\Entity\Task;
use Symfony\Component\EventDispatcher\Event;

class TaskEvent extends Event
{
    /**
     *
     * @var Task
     */

    private $task;

    /**
     * TaskEvent constructor.
     * @param Task $task
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * @return Task
     */
    public function getTask(): Task
    {
        return $this->task;
    }



}