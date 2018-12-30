<?php

namespace IDEALE\Http\Controllers\Api;

use IDEALE\Http\Controllers\Controller;
use IDEALE\Http\Requests\BillPayRequest;
use IDEALE\Http\Resources\BillPayCollection;
use IDEALE\Http\Resources\BillPayResource;
use IDEALE\Models\BillPay;
use Illuminate\Http\Request;

class BillPayController extends Controller
{
    public function index()
    {
        //lazy loading - this->category
        //eager loading - select * from categories where id in (2,3,4,5,10)
        $billPays = BillPay::with('category')->paginate();
        //return BillPayResource::collection($billPays);
        return new BillPayCollection($billPays);
    }

    public function store(BillPayRequest $request)
    {
        $category = BillPay::create($request->all());
        return new BillPayResource($category);
    }

    public function show(BillPay $bill_pay)
    {
        return new BillPayResource($bill_pay);
    }

    public function update(BillPayRequest $request, BillPay $bill_pay)
    {
        $bill_pay->fill($request->all());
        $bill_pay->save();

        return new BillPayResource($bill_pay);
    }

    public function destroy(BillPay $bill_pay)
    {
        $bill_pay->delete();

        return response()->json([],204);
    }
}
