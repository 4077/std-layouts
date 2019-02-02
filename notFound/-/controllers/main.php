<?php namespace std\layouts\notFound\controllers;

class Main extends \Controller
{
    public function view()
    {
        $v = $this->v();

        $v->assign([
                       'CONTENT' => '404'
                   ]);

        $this->css();

        $this->app->response->setStatusCode(404);

        return $v;
    }
}
