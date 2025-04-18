<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\PackageFilterRequest;
use App\Http\Requests\PackageRequest;
use App\Models\Package;
use App\Repositories\Interfaces\PackageRepositoryInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class PackageController extends BaseController
{
    use AuthorizesRequests;
    protected $PackageRepository;

    public function __construct(PackageRepositoryInterface $PackageRepository)
    {
        $this->PackageRepository = $PackageRepository;
    }

    public function index(PackageFilterRequest $request)
    {
        $this->authorize('viewAny', Package::class); // Policy Check
        $data = $this->PackageRepository->getAll($request->all());
        return $this->respondSuccess($data, "Package records retrieved successfully.");
    }
    public function getActiveAll(PackageFilterRequest $request)
    {
        $this->authorize('view', Package::class); // Policy Check
        $data = $this->PackageRepository->getActiveAll(
            $request->page,
            $request->limit,
            $request->search ?? [],
            $request->where ?? [],
            $request->order ?? 'created_at',
            $request->direction ?? 'DESC',
            $request->status
        );
        return $this->respondSuccess($data, "Package records retrieved successfully.");
    }

    public function store(PackageRequest $request)
    {
        $this->authorize('create', Package::class); // Policy Check
        $data = $this->PackageRepository->create($request->all());
        return $this->respondSuccess($data, "Package record created successfully.");
    }

    public function show($id)
    {
        $data = $this->PackageRepository->findById($id);
        if ($data !== null) {
            $this->authorize('view', $data); // Policy Check
        }
        if (!$data) {
            return $this->respondNotFound([], false, "Package record not found.");
        }

        return $this->respondSuccess($data, "Package record retrieved successfully.");
    }

    public function update(PackageRequest $request, $id)
    {
        $data = $this->PackageRepository->update($id, $request->all());
        $package = $this->PackageRepository->findById($id);
        if ($package !== null) {
            $this->authorize('update', $package); // Policy Check
        }
        if (!$data) {
            return $this->respondNotFound([], false, "Package record not found.");
        }
        return $this->respondSuccess($data, "Package record updated successfully.");
    }

    public function destroy($id)
    {
        $deleted = $this->PackageRepository->delete($id);
        $package = $this->PackageRepository->findById($id);
        if ($package !== null) {
            $this->authorize('update', $package); // Policy Check
        }
        if (!$deleted) {
            return $this->respondNotFound([], false, "Package record not found.");
        }
        return $this->respondSuccess([], "Package record deleted successfully.");
    }
}
