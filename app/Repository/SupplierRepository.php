<?php

namespace App\Repository;

use App\Models\Address;
use App\Models\Supplier;
use Illuminate\Support\Facades\Log;

class SupplierRepository implements SupplierInterface 
{
    public function all(string $order = 'asc'): ?array
    {
        try {

            return Supplier::select('suppliers.id as supplier_id', 'fantasy', 'social', 'email', 'document', 'phone',
                'ie', 'im', 'addresses.id as address_id', 
                'supplier_id', 'street', 'number', 
                'neighborhood', 'city', 'state', 'country')->join('addresses', 'suppliers.id', 'supplier_id')
                ->orderBy('suppliers.id', $order)
                ->paginate(10)
                ->toArray();
        } catch (\Exception $e) {
            Log::error($e->getFile() . ':' . $e->getLine());
            Log::error($e->getMessage());
            
            return null;
        }
    }

    public function create(array $data): ?bool
    {
        try {
            $created = Supplier::create($data);
            if (!$created) return false;
            $data['address']['supplier_id'] = $created->id;
            $address = Address::create($data['address']);
            if ($created && $address) return true;
            return false;
        } catch (\Exception $e) {
            Log::error($e->getFile() . ':' . $e->getLine());
            Log::error($e->getMessage());
            
            return null;
        }
    }

    public function update(array $data, $id)
    {
        try {
            $supplier = Supplier::findOrFail($id);
            $address = Address::where('supplier_id', $id)->first();
            $data['address']['supplier'] = $id;
            $address->update($data['address']);
            return $supplier->update($data);
        
        } catch (\Exception $e) {
            Log::error($e->getFile() . ':' . $e->getLine());
            Log::error($e->getMessage());
            
            return null;
        }
    }

    public function delete($id)
    {
        try {
            $supplier = Supplier::findOrFail($id);
            return $supplier->delete();
    
        } catch (\Exception $e) {
            Log::error($e->getFile() . ':' . $e->getLine());
            Log::error($e->getMessage());
            
            return null;
        }    
    }

    public function find($id)
    {
        try {
            return Supplier::select('suppliers.id as supplier_id', 'fantasy', 'social', 'email', 'document', 'phone',
                'ie', 'im', 'addresses.id as address_id', 
                'supplier_id', 'street', 'number', 
                'neighborhood', 'city', 'state', 'country')->join('addresses', 'suppliers.id', 'supplier_id')->where('suppliers.id', $id)
            ->get()->toArray();
        } catch (\Exception $e) {
            Log::error($e->getFile() . ':' . $e->getLine());
            Log::error($e->getMessage());
            
            return null;
        }
    }
}