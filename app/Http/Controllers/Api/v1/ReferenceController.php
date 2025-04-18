<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use App\Repositories\Interfaces\ReferenceRepositoryInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Requests\ReferenceRequest;
use App\Http\Requests\ReferenceFilterRequest;
use App\Models\Reference;

class ReferenceController extends BaseController
{
    use AuthorizesRequests;
    protected $referenceRepository;

    public function __construct(ReferenceRepositoryInterface $referenceRepository)
    {
        $this->referenceRepository = $referenceRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Reference::class);
        $data = $this->referenceRepository->getAll($request->all());
        return $this->respondSuccess($data, "Reference records retrieved successfully.");
    }

    public function getAll(ReferenceFilterRequest $request)
    {
        $data = $this->referenceRepository->getAll($request->validatedParams());
        return $this->respondSuccess($data, "Reference All records retrieved successfully.");
    }

    public function store(ReferenceRequest $request)
    {
        $this->authorize('create', Reference::class);
        $data = $this->referenceRepository->create($request->all());
        return $this->respondSuccess($data, "Reference created successfully.");
    }

    public function update(ReferenceRequest $request, $id)
    {
        $reference = $this->referenceRepository->findById($id);
        if (!$reference) {
            return $this->respondNotFound([], false, "Reference record not found.");
        }
        $this->authorize('update', $reference); // Policy Check
        $data = $this->referenceRepository->update($id, $request->all());
        return $this->respondSuccess($data, "Reference updated successfully.");
    }

    public function show($id)
    {
        $reference = $this->referenceRepository->findById($id);
        if (!$reference) {
            return $this->respondNotFound([], false, "Reference record not found.");
        }
        $this->authorize('view', $reference);
        return $this->respondSuccess($reference, "Reference details retrieved.");
    }

    public function destroy($id)
    {
        $reference = $this->referenceRepository->findById($id);
        if (!$reference) {
            return $this->respondNotFound([], false, "Reference record not found.");
        }
        $this->authorize('delete', $reference);
        $this->referenceRepository->delete($id);
        return $this->respondSuccess([], "Reference deleted successfully.");
    }
}
