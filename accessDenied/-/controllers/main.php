<?php namespace std\layouts\accessDenied\controllers;

class Main extends \Controller
{
    public function view()
    {
        $v = $this->v();

        $v->assign([
                       'CONTENT' => 'ACCESS DENIED'
                   ]);

        $this->css();

        return $v;
    }
}
