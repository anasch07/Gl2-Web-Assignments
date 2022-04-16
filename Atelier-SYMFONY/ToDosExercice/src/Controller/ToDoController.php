<?php

namespace App\Controller;

use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ToDoController extends AbstractController
{
    #[Route('/todos', name: 'app_todos')]
    public function index(SessionInterface $session): Response
    {
        if(!$session->has('todos')){
            $todos=array("Web"=>"ToDoListExerciceWithSymphony","Math"=>"Cours et td3","Cr"=>"Cr Prof Jeami :'(");
            $session->set('todos',$todos);
            $this->addFlash('info',"Welcome to our TodoList");
        }
        return $this->render('todos/index.html.twig', [
            'controller_name' => 'ToDoController',
        ]);
    }

    /**
     * @Route ("/todos/add/{name}/{content},"addToDo")
     */
    public function addTodo($name,$content,SessionInterface $session)
    {
        if(!$session->has("todos")){
            $this->addFlash('error','There is No TodoList');
        }
        else{
            $todos=$session->get('todos');
            if(isset($todos[$name])){
                $this->addFlash('error',"A ToDo already exist with this name");
            }
            else{
                $todos[$name]=$content;
                $session->set('todos',$todos);
                $this->addFlash('success',"Added ToDo Successfully");

            }
        }
        return $this->redirectToRoute("app_todos");
    }

    /**
     * @Route ("/todos/update/{name}/{content}","updateTodo")
     */
    public function update($name,$content,SessionInterface $session){
        if(!$session->has("todos")){
            $this->addFlash('error','There is No TodoList');
        }
        else{
            $todos=$session->get('todos');
            if(!isset($todos[$name])){
                $this->addFlash('error',"There is NoToDo with this name");
            }
            else{
                $todos[$name]=$content;
                $session->set('todos',$todos);
                $this->addFlash('success',"Updated $name Successfully");

            }
        }
        return $this->redirectToRoute("app_todos");
    }

    #[Route('todos/delete/{key}', name: 'deleteToDo')]
    public function deleteTodo(SessionInterface $session,$key):Response
    {
        if( !$session->has('todos')){
            $this->addFlash('error',"There is No ToDoList");
        }
        else{
            $todos=$session->get('todos');
            if(!isset($todos[$key])){
                $this->addFlash('error',"This ToDo does not exist ,please add a todo with this name before deleting it");
            }
            else{
                unset($todos[$key]);
                $session->set('todos',$todos);
                $this->addFlash("success","Deleted Successfully");
            }
        }
        return $this->redirectToRoute('app_todos');
    }

    /**
     * @Route("todos/reset", name="resetToDo")
     */
    public function resetToDo(SessionInterface $session) {

        if (!$session->has('todos')) {
            $this->addFlash('error', "There is No ToDoList");
        } else {
            $todos=array("Web"=>"ToDoListExerciceWithSymphony","Math"=>"Cours et td3","Cr"=>"Cr Prof Jeami :'(");
            $session->set('todos',$todos);
            $this->addFlash('success', "Reset Successfully");
        }
        return $this->redirectToRoute('app_todos');
    }

}
