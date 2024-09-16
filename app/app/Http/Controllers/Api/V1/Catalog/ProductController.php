<?php

namespace App\Http\Controllers\Api\V1\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepository;

class ProductController extends Controller
{
    private $repo;

    public function __construct(ProductRepository $repo)
    {
        $this->repo = $repo;
    }



    public function index(Request $request)
    {
        $products = $this->repo->paginate($request->all());

        return response()->json($products);
    }
}
