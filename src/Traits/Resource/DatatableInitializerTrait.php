<?php 

namespace BriskPs\BriskCore\Traits\Resource;

use Illuminate\Http\Request;

trait DatatableInitializerTrait {

    public function datatableInitializer(Request $request, $eloquent, $filters, $columns, $orderBy = [], $aggregations = [], $footer_info = "", $eloquent_append = []){
        if((int) $request->count) {
            return $eloquent->count();
        }

        if(isset($request->order_by_column) && isset($request->order_by_method)){
            // $eloquent->orderBy($request->order_by_column, $request->order_by_method);
        }elseif($orderBy !== []){
            $eloquent->orderBy($orderBy[0], $orderBy[1]);
        }else{
            $eloquent->orderBy('id', 'DESC');
        }
        
        if((int) trim($request->all)){
            $data = $eloquent->get();
            $data->append($eloquent_append);
            $data = ['data' => $data];
        }else{
            $per_page = 10;

            if(trim($request->per_page) !== ""){
                $per_page = trim($request->per_page);
            }

            $data = $eloquent->paginate($per_page);
            $data->append($eloquent_append);
        }

        $columns = collect(['filters' => $filters, 'table_title' => $this->title, 'columns' => $columns, 'footer' => ["info" => $footer_info], 'aggregations' => $aggregations]);
        $response = $columns->merge($data);

        return $response;
    }
}