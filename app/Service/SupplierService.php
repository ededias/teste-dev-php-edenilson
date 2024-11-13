<?php

namespace App\Service;

use App\Repository\SupplierInterface;

class SupplierService {

    public function __construct(
        protected SupplierInterface $supplierInterface
    ){} 


    public function all(string $order = 'asc') 
    {
        return $this->supplierInterface->all($order);
    }

    public function find(int $id) 
    {
        return $this->supplierInterface->find($id);    
    }

    public function create(array $payload)
    {
        try {
            
            return $this->supplierInterface->create($payload);

        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function delete($id)
    {
        return $this->supplierInterface->delete($id);
    } 

    public function update($data, $id)
    {
        return $this->supplierInterface->update($data, $id);
    }

}