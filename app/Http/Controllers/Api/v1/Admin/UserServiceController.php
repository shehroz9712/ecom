<?php

namespace App\Http\Controllers\Api\v1\Admin;

use App\Http\Controllers\Api\v1\BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Interfaces\UserServiceRepositoryInterface;
use App\Repositories\UserServiceRepository;
use Illuminate\Http\Request;
use App\Http\Requests\UserServiceRequest;
use App\Models\UserService;

class UserServiceController extends BaseController
{
    use AuthorizesRequests;

    protected $UserServiceRepository;

    public function __construct(UserServiceRepositoryInterface $UserServiceRepository)
    {
        $this->UserServiceRepository = $UserServiceRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', UserService::class);
        $data = $this->UserServiceRepository->getAll($request->all());
        return $this->respondSuccess($data, "User Services retrieved successfully.");
    }

    public function store(UserServiceRequest $request)
    {
        $this->authorize('create', UserService::class);
        $data = $this->UserServiceRepository->create($request->all());
        return $this->respondSuccess($data, "User Service created successfully.");
    }

    public function update(UserServiceRequest $request, $id)
    {
        // Get the file from the request
        $file = $request->file('file');

        // Log the file to check if it exists
        \Log::debug('Received file: ', ['file' => $file]);

        // Check if the file exists
        if (!$file || !$file->isValid()) {
            return $this->respondWithError(['error' => 'No valid file provided.']);
        }

        // Pass the file to the repository method
        $UserService = $this->UserServiceRepository->updateUserService($id, $file);

        if (!$UserService) {
            return $this->respondWithError(['error' => 'User Service not found or invalid file.']);
        }

        return $this->respondSuccess($UserService, "User Service updated successfully.");
    }

    public function show($id)
    {
        $UserService = $this->UserServiceRepository->findById($id);
        $this->authorize('view', $UserService);
        return $this->respondSuccess($UserService, "User Service details retrieved.");
    }

    public function destroy($id)
    {
        $UserService = $this->UserServiceRepository->findById($id);
        $this->authorize('delete', $UserService);
        $this->UserServiceRepository->delete($id);
        return $this->respondSuccess([], "User Service deleted successfully.");
    }
}
