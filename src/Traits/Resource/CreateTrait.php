<?php 

namespace BriskPs\BriskCore\Traits\Resource;

trait CreateTrait {
    
    public function create(){
        return response()->json((new $this->model)->createFormGenerator((isset($this->except) ? $this->except : [])));
    }
}