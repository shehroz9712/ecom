<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductFilterRequest;
use App\Models\Product;

class ProductController extends BaseController
{
    use AuthorizesRequests;

    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index(ProductFilterRequest $request)
    {
        $this->authorize('viewAny', Product::class);
        $data = $this->productRepository->getActiveAll($request->page);
        return $this->respondSuccess($data, "Product Active records retrieved successfully.");
    }

    public function getAll(ProductFilterRequest $request)
    {
        $data = $this->productRepository->getAll($request->validatedParams());
        return $this->respondSuccess($data, "Product All records retrieved successfully.");
    }

    public function store(ProductRequest $request)
    {
        $this->authorize('create', Product::class);
        $data = $this->productRepository->create($request->all());
        return $this->respondSuccess($data, "Product created successfully.");
    }


    public function update(ProductRequest $request, $id)
    {
        $product = $this->productRepository->findById($id);
        $this->authorize('update', $product);
        $data = $this->productRepository->update($request->all(), $id);
        return $this->respondSuccess($data, "Product updated successfully.");
    }
    public function show($id)
    {
        $product = $this->productRepository->findById($id);
        $this->authorize('view', $product);
        return $this->respondSuccess($product, "Product details retrieved.");
    }

    public function destroy($id)
    {
        $product = $this->productRepository->findById($id);
        $this->authorize('delete', $product);
        $this->productRepository->delete($id);
        return $this->respondSuccess($product, "Product deleted successfully.");
    }
}
