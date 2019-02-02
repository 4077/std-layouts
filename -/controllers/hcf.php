<?php namespace std\layouts\controllers;

class Hcf extends \Controller
{
    public function view()
    {
        $v = $this->v();

        $this->css();

        $v->assign([
                       'CLASS'   => $this->data('class'),
                       'BEFORE'  => $this->data('before'),
                       'AFTER'   => $this->data('after'),
                       'HEADER'  => $this->data('header'),
                       'CONTENT' => $this->data('content'),
                       'FOOTER'  => $this->data('footer'),
                       'COMMON'  => $this->data('common')
                   ]);

        return $v;
    }
}
