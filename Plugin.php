<?php

namespace Analytics;

use MapasCulturais\App;

class Plugin extends \MapasCulturais\Plugin
{
    public function __construct(array $config = [])
    {
        $config += [
            "analytics_key" => env("ANALYTICS_KEY",""),
        ];

        parent::__construct($config);
    }
    
    public function _init()
    {
        $app = App::i();
        
        $self = $this;

        $app->hook("template(<<*>>.<<*>>.main-head):after", function () use ($self) {
            $config = $self->config;
            if($config['analytics_key']){
                $this->part('analytics',["config" => $config]);
            }
        });
    }

    public function register()
    {
    }
}
