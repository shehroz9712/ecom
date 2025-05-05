<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\StateRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\StateRequest;
use App\Http\Requests\StateFilterRequest;
use App\Models\State;

class StateController extends BaseController
{
    use AuthorizesRequests;

    protected $stateRepository;

    public function __construct(StateRepositoryInterface $stateRepository)
    {
        $this->stateRepository = $stateRepository;
    }

    public function index(StateFilterRequest $request)
    {
        $this->authorize('viewAny', State::class);
        $data = $this->stateRepository->getActiveAll($request->page);
        return $this->respondSuccess($data, "State Active records retrieved successfully.");
    }

    public function getAll(StateFilterRequest $request)
    {
        $data = $this->stateRepository->getAll($request->validatedParams());
        return $this->respondSuccess($data, "State All records retrieved successfully.");
    }

    public function store(StateRequest $request)
    {
        $this->authorize('create', State::class);
        $data = $this->stateRepository->create($request->all());
        return $this->respondSuccess($data, "State created successfully.");
    }


    public function update(StateRequest $request, $id)
    {
        $state = $this->stateRepository->findById($id);
        $this->authorize('update', $state);
        $data = $this->stateRepository->update($request->all(), $id);
        return $this->respondSuccess($data, "State updated successfully.");
    }
    public function show($id)
    {
        $state = $this->stateRepository->findById($id);
        $this->authorize('view', $state);
        return $this->respondSuccess($state, "State details retrieved.");
    }

    public function destroy($id)
    {
        $state = $this->stateRepository->findById($id);
        $this->authorize('delete', $state);
        $this->stateRepository->delete($id);
        return $this->respondSuccess($state, "State deleted successfully.");
    }
}
