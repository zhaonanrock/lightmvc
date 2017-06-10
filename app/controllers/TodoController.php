<?php
/**
 * Created by PhpStorm.
 * User: Cral
 * Date: 2017/6/10
 * Time: 13:58
 */

namespace app\controllers;

use app\models\ToDo;

class TodoController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $todos = ToDo::all();
        return $this->render('todo/index', ['todos' => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return $this->redirect('todo/index');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store()
    {
        $toDo = new ToDo();
        $toDo->title = $_POST['title'];
        $toDo->status = false;
        $toDo->save();
        return $this->redirect('todo/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     */
    public function edit($id)
    {
        $toDo = ToDo::byId($id);
        $toDo->status = true;
        $toDo->save();
        return $this->redirect('todo/index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     */
    public function destroy($id)
    {
        $toDo = ToDo::byId($id);
        $toDo->delete($id);
        return $this->redirect('todo/index');
    }

}