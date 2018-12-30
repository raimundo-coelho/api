<?php

namespace IDEALE\Http\Controllers\Api;

use IDEALE\Http\Controllers\Controller;
use IDEALE\Http\Requests\BillPayRequest;
use IDEALE\Http\Resources\BillPayCollection;
use IDEALE\Http\Resources\BillPayResource;
use IDEALE\Http\Resources\CategoryBillPayCollection;
use IDEALE\Models\BillPay;
use IDEALE\Models\Category;
use Illuminate\Http\Request;

class CategoryBillPayController extends Controller
{
    public function index(Category $category)
    {
        $billPays = $category->billPays()->paginate();
        //return BillPayResource::collection($billPays);
        return new CategoryBillPayCollection($billPays, $category);
    }
}

/*
 * about
 * category
 * data
 * meta
 * link
 */
