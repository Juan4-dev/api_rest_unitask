<?php

namespace App\Repositories;

use App\Interfaces\BaseInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();  
    }

    public function getById($id)
    {
        $registro = $this->model->find($id);  

        if(!$registro)
        {
            return null;
        }

        return $registro;
    }

    public function create(array $data)
    {
        return $this->model->create($data); 
    }

    public function update($id, array $data)
    {
        $registro = $this->model->find($id);

        if(!$registro)
        {
            return null;
        }

        $registro->update($data);

        return $registro->fresh();
    }

    public function delete($id)
    {
        $registro = $this->model->find($id);
        if(!$registro)
        {
            return null;
        }
        return $registro->delete();
    }
}
