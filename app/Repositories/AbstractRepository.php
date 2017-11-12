<?php

namespace App\Repositories;

class AbstractRepository implements IRepository
{

    /**
     * @param int $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->model->where('id', $id)->first();
    }

    /**
     * @param int $limit
     * @param bool $is_paginate
     * @return mixed
     */
    public function getAll($limit = 10, $is_paginate = false)
    {
        return $this->model->select()
                            ->orderBy('created_at', 'desc')
                            ->paginate($limit);
    }

    /**
     * @return mixed
     */
    public function getAllNoLimit()
    {
        return $this->model->select()
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * @param array $attributes
     * @param int $id
     * @param bool $getDataBack
     * @return mixed
     */
    public function update(array $attributes, $id, $getDataBack = false)
    {
        $update = $this->model->where('id', $id)->update($attributes);

        if($getDataBack)
            $update = $this->getById($id);

        return $update;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function remove($id)
    {
        return $this->model->where('id', $id)->delete();
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        $data = $this->model->create($attributes);

        return $data;
    }
}