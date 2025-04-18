<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\ExperienceRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\ExperienceRequest;
use App\Http\Requests\ExperienceFilterRequest;
use App\Models\Experience;

class ExperienceController extends BaseController
{
    use AuthorizesRequests;
    protected $experienceRepository;

    public function __construct(ExperienceRepositoryInterface $experienceRepository)
    {
        $this->experienceRepository = $experienceRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Experience::class);
        $data = $this->experienceRepository->getAll($request->all());
        return $this->respondSuccess($data, "Experience records retrieved successfully.");
    }

    public function getAll(ExperienceFilterRequest $request)
    {
        $data = $this->experienceRepository->getAll($request->validatedParams());
        return $this->respondSuccess($data, "Experience All records retrieved successfully.");
    }

    public function store(ExperienceRequest $request)
    {
        $this->authorize('create', Experience::class);
        $data = $this->experienceRepository->create($request->all());
        return $this->respondSuccess($data, "Experience created successfully.");
    }

    public function update(ExperienceRequest $request, $id)
    {
        $experience = $this->experienceRepository->findById($id);
        if (!$experience) {
            return $this->respondNotFound([], false, "Experience record not found.");
        }
        $this->authorize('update', $experience); // Policy Check
        $data = $this->experienceRepository->update($id, $request->all());
        return $this->respondSuccess($data, "Experience updated successfully.");
    }

    public function show($id)
    {
        $experience = $this->experienceRepository->findById($id);
        if (!$experience) {
            return $this->respondNotFound([], false, "Experience record not found.");
        }
        $this->authorize('view', $experience);
        return $this->respondSuccess($experience, "Experience details retrieved.");
    }

    public function destroy($id)
    {
        $experience = $this->experienceRepository->findById($id);
        if (!$experience) {
            return $this->respondNotFound([], false, "Experience record not found.");
        }
        $this->authorize('delete', $experience);
        $this->experienceRepository->delete($id);
        return $this->respondSuccess([], "Experience deleted successfully.");
    }
}
