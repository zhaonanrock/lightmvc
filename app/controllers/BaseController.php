<?php
/**
 * Created by PhpStorm.
 * User: zhaon
 * Date: 2017/6/10
 * Time: 15:19
 */

namespace app\controllers;

use Pheasant;
use Latte\Engine;

class BaseController
{
    private $config;
    private $latte;

    public function __construct()
    {
        $this->loadConfig();
        $this->initDb();
        $this->initTpl();
    }
    //加载配置文件
    public function loadConfig()
    {
        $this->config = require APP_ROOT . '/config/base.php';
    }
    //连接数据库
    public function initDb()
    {
        Pheasant::setup($this->config['dsn']);
    }
    //初始化模板引擎
    public function initTpl()
    {
        $this->latte = new Engine();
        $this->latte->setTempDirectory(APP_ROOT . '/storage/views');
    }
    //跳转到view层
    public function render($name, array $params = [], $block = NULL)
    {
        $params['sitename'] = 'zhaonan mvc framework';
        $tplFile = APP_ROOT . '/views/' . $name . '.latte';
        $this->latte->render($tplFile, $params, $block);
    }
    //重定向方法
    public function redirect($name)
    {
        header('Location:' . SITE_URL . '/' . $name);
    }

}