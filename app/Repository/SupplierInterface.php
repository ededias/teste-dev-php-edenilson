<?php

namespace App\Repository;

interface SupplierInterface 
{
    public function all(string $order);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id);
}