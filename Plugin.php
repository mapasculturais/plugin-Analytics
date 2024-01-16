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

        $app->hook("template(site.<<*>>.main-head):after", function () use ($self) {
            $config = $self->config;
            $this->part('analytics',["config" => $config]);
        });
    }

    public function register()
    {
    }
}
