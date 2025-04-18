<?php

namespace App\Http\Controllers\Api\v1\Admin;

use App\Http\Controllers\Api\v1\BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\ServiceRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;

class ServiceController extends BaseController
{
    use AuthorizesRequests;

    protected $serviceRepository;

    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Service::class);
        $data = $this->serviceRepository->getAll($request->all());
        return $this->respondSuccess($data, "Service records retrieved successfully.");
    }

    public function store(ServiceRequest $request)
    {
        $this->authorize('create', Service::class);
        $data = $this->serviceRepository->create($request->all());
        return $this->respondSuccess($data, "Service created successfully.");
    }

    public function update(UpdateServiceRequest $request, $id)
    {
        $service = $this->serviceRepository->findById($id);
        if (!$service) {
            return $this->respondNotFound([], false, "Service record not found.");
        }
        $this->authorize('update', $service); // Policy Check
        $data = $this->serviceRepository->update($id, $request->all());
        return $this->respondSuccess($data, "Service updated successfully.");
    }

    public function show($id)
    {
        $service = $this->serviceRepository->findById($id);
        if (!$service) {
            return $this->respondNotFound([], false, "Service record not found.");
        }
        $this->authorize('view', $service);
        return $this->respondSuccess($service, "Service details retrieved.");
    }

    public function destroy($id)
    {
        $service = $this->serviceRepository->findById($id);
        if (!$service) {
            return $this->respondNotFound([], false, "Service record not found.");
        }
        $this->authorize('delete', $service);
        $this->serviceRepository->delete($id);
        return $this->respondSuccess([], "Service deleted successfully.");
    }
}
