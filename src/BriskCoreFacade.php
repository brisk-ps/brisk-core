<?php

namespace BriskPs\BriskCore;

use Illuminate\Support\Facades\Facade;

class BriskCoreFacade extends Facade{

    protected static function getFacadeAccessor(){
        return "brisk-core";
    }
}