<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\ProjectRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests\ProjectFilterRequest;
use App\Models\Project;

class ProjectController extends BaseController
{
    use AuthorizesRequests;

    protected $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', Project::class);
        $data = $this->projectRepository->getAll($request->all());
        return $this->respondSuccess($data, "Project records retrieved successfully.");
    }

    public function getAll(ProjectFilterRequest $request)
    {
        $data = $this->projectRepository->getAll($request->validatedParams());
        return $this->respondSuccess($data, "Project All records retrieved successfully.");
    }

    public function store(ProjectRequest $request)
    {
        $this->authorize('create', Project::class);
        $data = $this->projectRepository->create($request->all());
        return $this->respondSuccess($data, "Project created successfully.");
    }

    public function update(ProjectRequest $request, $id)
    {
        $project = $this->projectRepository->findById($id);
        if (!$project) {
            return $this->respondNotFound([], false, "Project record not found.");
        }
        $this->authorize('update', $project);
        $data = $this->projectRepository->update($id, $request->all());
        return $this->respondSuccess($data, "Project updated successfully.");
    }

    public function show($id)
    {
        $project = $this->projectRepository->findById($id);
        if (!$project) {
            return $this->respondNotFound([], false, "Project record not found.");
        }
        $this->authorize('view', $project);
        return $this->respondSuccess($project, "Project details retrieved.");
    }

    public function destroy($id)
    {
        $project = $this->projectRepository->findById($id);
        if (!$project) {
            return $this->respondNotFound([], false, "Project record not found.");
        }
        $this->authorize('delete', $project);
        $this->projectRepository->delete($id);
        return $this->respondSuccess([], "Project deleted successfully.");
    }
}
