<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\VendorRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\VendorRequest;
use App\Http\Requests\VendorFilterRequest;
use App\Models\Vendor;

class VendorController extends BaseController
{
    use AuthorizesRequests;

    protected $vendorRepository;

    public function __construct(VendorRepositoryInterface $vendorRepository)
    {
        $this->vendorRepository = $vendorRepository;
    }

    public function index(VendorFilterRequest $request)
    {
        $this->authorize('viewAny', Vendor::class);
        $data = $this->vendorRepository->getActiveAll($request->page);
        return $this->respondSuccess($data, "Vendor Active records retrieved successfully.");
    }

    public function getAll(VendorFilterRequest $request)
    {
        $data = $this->vendorRepository->getAll($request->validatedParams());
        return $this->respondSuccess($data, "Vendor All records retrieved successfully.");
    }

    public function store(VendorRequest $request)
    {
        $this->authorize('create', Vendor::class);
        $data = $this->vendorRepository->create($request->all());
        return $this->respondSuccess($data, "Vendor created successfully.");
    }


    public function update(VendorRequest $request, $id)
    {
        $vendor = $this->vendorRepository->findById($id);
        $this->authorize('update', $vendor);
        $data = $this->vendorRepository->update($request->all(), $id);
        return $this->respondSuccess($data, "Vendor updated successfully.");
    }
    public function show($id)
    {
        $vendor = $this->vendorRepository->findById($id);
        $this->authorize('view', $vendor);
        return $this->respondSuccess($vendor, "Vendor details retrieved.");
    }

    public function destroy($id)
    {
        $vendor = $this->vendorRepository->findById($id);
        $this->authorize('delete', $vendor);
        $this->vendorRepository->delete($id);
        return $this->respondSuccess($vendor, "Vendor deleted successfully.");
    }
}
