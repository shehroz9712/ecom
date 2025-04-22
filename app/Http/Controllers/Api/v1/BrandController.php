<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\BrandRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\BrandFilterRequest;
use App\Models\Brand;

class BrandController extends BaseController
{
    use AuthorizesRequests;

    protected $brandRepository;

    public function __construct(BrandRepositoryInterface $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    public function index(BrandFilterRequest $request)
    {
        $this->authorize('viewAny', Brand::class);
        $data = $this->brandRepository->getActiveAll($request->page);
        return $this->respondSuccess($data, "Brand Active records retrieved successfully.");
    }

    public function getAll(BrandFilterRequest $request)
    {
        $data = $this->brandRepository->getAll($request->validatedParams());
        return $this->respondSuccess($data, "Brand All records retrieved successfully.");
    }

    public function store(BrandRequest $request)
    {
        $this->authorize('create', Brand::class);
        $data = $this->brandRepository->create($request->all());
        return $this->respondSuccess($data, "Brand created successfully.");
    }


    public function update(BrandRequest $request, $id)
    {
        $brand = $this->brandRepository->findById($id);
        $this->authorize('update', $brand);
        $data = $this->brandRepository->update($request->all(), $id);
        return $this->respondSuccess($data, "Brand updated successfully.");
    }
    public function show($id)
    {
        $brand = $this->brandRepository->findById($id);
        $this->authorize('view', $brand);
        return $this->respondSuccess($brand, "Brand details retrieved.");
    }

    public function destroy($id)
    {
        $brand = $this->brandRepository->findById($id);
        $this->authorize('delete', $brand);
        $this->brandRepository->delete($id);
        return $this->respondSuccess($brand, "Brand deleted successfully.");
    }
}
