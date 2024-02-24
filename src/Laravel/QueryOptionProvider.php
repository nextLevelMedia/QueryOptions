<?php

namespace CodMono\QueryOption\Laravel;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use CodMono\QueryOption\QueryOption;
use CodMono\QueryOption\QueryOptionFactory;

class QueryOptionProvider extends ServiceProvider
{
    public function register()
    {
        Request::macro('queryOption', function () {
            return QueryOptionFactory::createFromIlluminateRequest(app('request'));
        });

        $this->app->bind(QueryOption::class, function () {
            return QueryOptionFactory::createFromIlluminateRequest(app('request'));
        });
    }
}
