<?php

namespace App\Transformer;

use App\Models\Dummy;
use League\Fractal\TransformerAbstract;

class DummysTransform extends TransformerAbstract
{

    public function transform(Dummy $data)
    {
        return $data->toArray();
    }
}
