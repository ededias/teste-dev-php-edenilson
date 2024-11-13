<?php

namespace App\Http\Controllers;

use App\Http\Requests\Supplier;
use App\Rules\DocumentRule;
use App\Rules\PhoneRule;
use App\Service\SupplierService;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function __construct(
        protected SupplierService $service
    ){}

    public function all(Request $request)
    {
        $orderBy = $request->orderBy ? $request->orderBy : 'asc';
        
        $data = $this->service->all($orderBy);
        return response()->json($data, 200);
    }
    

    public function create(Request $request)
    {
        $validator = $this->validator($request);
        if ($validator != null) return response()->json($validator['errors']);
        $data = $request->json()->all();
        $this->service->create($data);
    }

    public function find($id) 
    {
        $data = $this->service->find((int) $id);
        return response()->json($data);
    }

    public function delete($id) 
    {
        $data = $this->service->delete((int)$id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $validator = $this->validator($request);
        if ($validator != null) return response()->json($validator['errors']);
        
        $data = $request->json()->all();
        $data = $this->service->update($data, $id);
        return $data;
    }

    private function validator($request) 
    {
        $validator = validator($request->json()->all(),[
            'email' => 'required|email:rfc,dns',
            'fantasy' => 'required',
            'social' => 'required',
            'ie' => 'required',
            'im' => 'required',
            'category' => 'required',
            'document' => [
                new DocumentRule()
            ],
            'phone' => [
                new PhoneRule()
            ],
            'address.zipcode' => 'required',
            'address.street' => 'required',
            'address.number' => 'required',
            'address.neighborhood' => 'required',
            'address.city' => 'required',
            'address.state' => 'required',
            'address.country' => 'required'
        ]);
        
        if ($validator->fails()) return ['errors' => $validator->errors()];
        return null;

    }

}
