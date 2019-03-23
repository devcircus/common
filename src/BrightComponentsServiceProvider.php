<?php

namespace BrightComponents\Common;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class BrightComponentsServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->bootResponseMacros();
    }

    /**
     * Boot the Response macros.
     */
    public function bootResponseMacros()
    {
        Response::mixin(new \BrightComponents\Common\Macros\Response);
    }
}
