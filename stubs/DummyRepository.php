<?php

namespace App\Repositories;

use App\Models\Dummy;

class DummysRepository extends AbstractRepository
{

    protected $modelClass = Dummy::class;

    /**
     * Array dos campos que devem ser validados
     *
     * @return array
     */
    public function getValidate()
    {
        return [];
    }
}
