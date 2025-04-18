<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use App\Http\Requests\EducationFilterRequest;
use App\Repositories\Interfaces\EducationRepositoryInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Requests\EducationRequest;
use App\Models\Education;

class EducationController extends BaseController
{
    use AuthorizesRequests;
    protected $educationRepository;

    public function __construct(EducationRepositoryInterface $educationRepository)
    {
        $this->educationRepository = $educationRepository;
        parent::__construct();
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Education::class); // Policy Check
        $data = $this->educationRepository->getAll($request->all());
        return $this->respondSuccess($data, "Education records retrieved successfully.");
    }

    public function getAll(EducationFilterRequest $request)
    {
        $data = $this->educationRepository->getAll($request->validatedParams());
        return $this->respondSuccess($data, "Education All records retrieved successfully.");
    }

    public function store(EducationRequest $request)
    {
        $this->authorize('create', Education::class); // Policy Check
        $data = $this->educationRepository->create($request->all());
        return $this->respondSuccess($data, "Education created successfully.");
    }

    public function show($id)
    {
        $education = $this->educationRepository->findById($id);
        if (!$education) {
            return $this->respondNotFound([], false, "Education record not found.");
        }
        $this->authorize('view', $education); // Policy Check
        return $this->respondSuccess($education, "Education details retrieved.");
    }

    public function update(EducationRequest $request, $id)
    {
        $education = $this->educationRepository->findById($id);
        if (!$education) {
            return $this->respondNotFound([], false, "Education record not found.");
        }
        $this->authorize('update', $education); // Policy Check
        $data = $this->educationRepository->update($id, $request->all());
        return $this->respondSuccess($data, "Education updated successfully.");
    }

    public function destroy($id)
    {
        $education = $this->educationRepository->findById($id);
        if (!$education) {
            return $this->respondNotFound([], false, "Education record not found.");
        }
        $this->authorize('delete', $education); // Policy Check
        $this->educationRepository->delete($id);
        return $this->respondSuccess([], "Education deleted successfully.");
    }
}
