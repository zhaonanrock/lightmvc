<?php
namespace app\controllers;

use Pheasant;
use Pheasant\Types;
use app\models\ToDo;

/**
 * Created by PhpStorm.
 * User: zhaon
 * Date: 2017/6/10
 * Time: 11:00
 */
class UserController
{
    public function show($args,$args1)
    {
        //echo "show";
        var_dump($args);
        var_dump($args1);
    }
    public function listAll()
    {
        echo "ListAll";
    }
    public function migrate()
    {
        Pheasant::setup('mysql://root:root@localhost:3306/framework');
        $migrator = new \Pheasant\Migrate\Migrator();
        $migrator->initialize(ToDo::schema(), 'todo');
        echo "Migrate done!";

    }
    public function test()
    {
        Pheasant::setup('mysql://root:root@localhost:3306/framework');

        $todo = new Todo();
        $todo->title = 'test1';
        $todo->status = false;
        $todo->save();
        echo "Save success!";
    }
    public function delete()
    {
        Pheasant::setup('mysql://root:root@localhost:3306/framework');

        $todo = Todo::byId(1);
        $todo->delete();
        echo "Delete success!";
    }
}