<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use App\Repository\TaskRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TaskController extends Controller
{
    /**
     * @Route("/", name="task")
     * @Route("/", name="homepage")
     */
    public function index(TaskRepository $repository)
    {
        $tasks = $repository->findAll();

        return $this->render('task/index.html.twig', [
            'controller_name' => 'TaskController',
            'tasks' => $tasks,
        ]);
    }

    /**
     * @Route("/task/new" , name="task_new")
     */
    public function new()
    {
        $task = new Task();
       $form = $this->createForm(TaskType::class , $task );

        return $this->render('task/new.html.twig', [
            'form' => $form->createView() ,
        ]);
    }
}
