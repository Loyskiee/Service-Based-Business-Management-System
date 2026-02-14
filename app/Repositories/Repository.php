<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
abstract class Repository
{
    /**
     * This avoids boiler plate 
     */
    public function __construct(protected Model $model)
    {}

    /**
     * Get all model
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Get specific model based on id
     */
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Updating a model 
     */
    public function update($id, array $data)
    {
        $model = $this->find($id);
        $model->update($data);
        return $model;
    }

    /**
     * Deleting a model
     */
    public function delete($id)
    {
        return $this->find($id)->delete();

    }
}

