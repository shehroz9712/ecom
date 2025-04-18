<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\UserSkillRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\UserSkillRequest;
use App\Http\Requests\UserSkillFilterRequest;
use App\Models\UserSkill;

class UserSkillController extends BaseController
{
    use AuthorizesRequests;

    protected $userSkillRepository;

    public function __construct(UserSkillRepositoryInterface $userSkillRepository)
    {
        $this->userSkillRepository = $userSkillRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', UserSkill::class);
        $data = $this->userSkillRepository->getActiveAll($request->page);
        return $this->respondSuccess($data, "User Skill records retrieved successfully.");
    }

    public function getAll(UserSkillFilterRequest $request)
    {
        $data = $this->userSkillRepository->getAll($request->validatedParams());
        return $this->respondSuccess($data, "User Skill All records retrieved successfully.");
    }

    public function store(UserSkillRequest $request)
    {
        $this->authorize('create', UserSkill::class);
        $data = $this->userSkillRepository->create($request->all());
        return $this->respondSuccess($data, "User Skill created successfully.");
    }

    public function show($id)
    {
        $userSkill = $this->userSkillRepository->findById($id);
        $this->authorize('view', $userSkill);
        return $this->respondSuccess($userSkill, "User Skill details retrieved.");
    }

    public function destroy($id)
    {
        $userSkill = $this->userSkillRepository->findById($id);
        $this->authorize('delete', $userSkill);
        $this->userSkillRepository->delete($id);
        return $this->respondSuccess([], "User Skill deleted successfully.");
    }
}
