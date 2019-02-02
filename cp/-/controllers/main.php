<?php namespace std\layouts\cp\controllers;

class Main extends \Controller
{
    public function view()
    {
        if ($this->_user()) {
            $v = $this->v();

            $s = $this->s(false, [
                'header_hidden' => false
            ]);

            $appName = $this->app->getConfig('name');
            $metaTitle = $this->data('meta/title');

            $this->app->html->setTitle(($metaTitle ? $metaTitle : 'cp') . ' - ' . $appName);

            $v->assign([
                           'VIEWPORT_CLASS'      => $this->data('viewport') ? 'viewport' : '',
                           'FLEX_CLASS'          => $this->data('flex') ? 'flex' : '',
                           'PADDING'             => $this->data('padding'),
                           'HEADER_HIDDEN_CLASS' => $s['header_hidden'] ? 'header_hidden' : '',
                           'INDEX_BUTTON'        => $this->c('\std\ui tag:view:a', [
                               'attrs'   => [
                                   'href'  => abs_url(),
                                   'class' => 'index_button',
                                   'hover' => 'hover'
                               ],
                               'content' => '<div class="indicator">' . $appName . '</div>'
                           ]),
                           'NAV'                 => $this->data('nav'),
                           'LOGOUT_BUTTON'       => $this->c('\std\ui button:view', [
                               'path'    => '>xhr:logout',
                               'class'   => 'logout_button',
                               'content' => '<span class="login">' . $this->_user('login') . '</span> выход'
                           ]),
                           'CONTENT'             => $this->data('content')
                       ]);

            $this->css('reset', [
                '__nodeId__' => $this->_nodeId()
            ]);

            $envId = $this->_env();

            $css = $this->css();

            $hslByEnvId = $this->data('hsl_by_env_id');

            $hsl = ap($hslByEnvId, $envId) or
            $hsl = '150, 20, 10';

            list($hue, $saturation, $lightness) = l2a($hsl);

            $css->setVars([
                              'hue'        => (int)$hue,
                              'saturation' => (int)$saturation,
                              'lightness'  => (int)$lightness,
                          ]);


            $this->widget(':', [
                'paths' => [
                    'toggleHeaderHidden' => $this->_p('>xhr:toggleHeaderHidden')
                ]
            ]);

            return $v;
        }
    }
}
