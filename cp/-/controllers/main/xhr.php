<?php namespace std\layouts\cp\controllers\main;

class Xhr extends \Controller
{
    public $allow = self::XHR;

    public function logout()
    {
        $this->c('\ewma\access~:logout');
    }

    public function toggleHeaderHidden()
    {
        $s = &$this->s('~');

        invert($s['header_hidden']);

        $jqueryBuilder = $this->jquery($this->_selector('<:.'));

        if ($s['header_hidden']) {
            $jqueryBuilder->addClass('header_hidden');
        } else {
            $jqueryBuilder->removeClass('header_hidden');
        }
    }
}
