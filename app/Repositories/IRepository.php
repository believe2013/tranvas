<?php

namespace App\Repositories;

interface IRepository
{
    public function getById($id);

    public function getAll($limit = 10, $is_paginate = false);

    public function getAllNoLimit();

    public function update(array $attributes, $id, $getDataBack = false);

    public function remove($id);

    public function create(array $attributes);
}