<?php 

namespace BriskPs\BriskCore\Traits;

trait ModelTrait {
    
    public function createFormGenerator($except){
        $rows = [];

        foreach ($this->getEntityAttributesMethods() as $key => $attributeMethod) {
            if(in_array(trim($this->$attributeMethod()["name"]), $except)){
                continue;
            }

            // if(!isset($this->$attributeMethod()["rowIndex"])){
            //     continue;
            // }

            // if(!isset($rows[$this->$attributeMethod()["rowIndex"]])){
            //     $rows[$this->$attributeMethod()["rowIndex"]] = [];
            // }

            // array_push($rows[$this->$attributeMethod()["rowIndex"]], $this->$attributeMethod());
            
            if(!isset($rows[$key])){
                $rows[$key] = [];
            }
            
            $rows[$key][] = $this->$attributeMethod();
        }

        $response = [];

        foreach($rows as $row){
            if(sizeof($row) > 1){
                $response[] = $row;
            }else{
                $response[] = $row[0];
            }
        }

        return ["inputs" => $response];
    }

    public function getEntityAttributesMethods(){
        $attributes = [];
    
        foreach (get_class_methods(get_class($this)) as $key => $method) {
            if($method[0] == "_" && $method[1] !== "_"){
                // array_push($attributes, substr($method, 1, strlen($method)));
                array_push($attributes, $method);
            }
        }
    
        return $attributes;
    }

    public function getBriskFillable(){
        return $this->fillableBrisk;
    }
}