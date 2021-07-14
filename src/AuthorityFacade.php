<?php


namespace Lipeng93\Authority;
use \Illuminate\Support\Facades\Facade;

class AuthorityFacade extends Facade
{
    protected static function getFacadeAccessor() {
        return 'authority';
    }
}