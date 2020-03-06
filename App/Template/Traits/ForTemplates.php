<?php

namespace App\Template\Traits;

use App\Template\Scopes\TemplateScope;
use App\Template\TemplateManager;
use TemplateObserver;

trait ForTemplates
{

    public static function boot()
    {

        parent::boot();

        $manager = app(TemplateManager::class);
        static::addGlobalScope(

            new TemplateScope($manager->getTemplate())

        );


        // static::observe(
        //     app(TemplateObserver::class)
        // );

    }
}
