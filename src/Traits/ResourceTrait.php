<?php 

namespace BriskPs\BriskCore\Traits;

trait ResourceTrait {
    use \BriskPs\BriskCore\Traits\Resource\ListTrait;
    use \BriskPs\BriskCore\Traits\Resource\CreateTrait;
    use \BriskPs\BriskCore\Traits\Resource\UpdateTrait;
    use \BriskPs\BriskCore\Traits\Resource\DestroyTrait;
    use \BriskPs\BriskCore\Traits\Resource\DatatableInitializerTrait;

}