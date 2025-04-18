<?php

namespace App\Http\Controllers\Api\v1\Admin;

use Carbon\Carbon;
use App\Http\Controllers\Api\v1\BaseController;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class UserController extends BaseController
{
    use AuthorizesRequests;
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('viewAny', User::class);
        $data = $this->userRepository->getAll($request->all());
        return $this->respondSuccess($data, "User records retrieved successfully.");
    }

    public function store(UserRequest $request)
    {
        $this->authorize('create', User::class);
        $user = $this->userRepository->create($request->all());
        // Hide unnecessary fields
        return $this->respondSuccess(
            $user->makeHidden(['role_names', 'roles']),
            "User created successfully."
        );
    }


    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->userRepository->findById($id);
        if (!$user) {
            return $this->respondNotFound([], false, "User record not found.");
        }
        $this->authorize('update', $user);
        $updatedUser = $this->userRepository->update($id, $request->all());
        return $this->respondSuccess(
            $updatedUser->makeHidden(['role_names', 'roles']),
            "User updated successfully."
        );
    }


    public function show($id)
    {
        $user = $this->userRepository->findById($id);
        if (!$user) {
            return $this->respondNotFound([], false, "User record not found.");
        }
        $this->authorize('view', $user);
        return $this->respondSuccess($user, "Users details retrieved.");
    }

    public function destroy($id)
    {
        $user = $this->userRepository->findById($id);
        $this->authorize('delete', $user);
        if (!$user) {
            return $this->respondNotFound([], false, "User record not found.");
        }
        $this->userRepository->delete($id);
        return $this->respondSuccess([], "User deleted successfully.");
    }

    public function getUserCreationCountsLastWeek(Request $request)
    {
        // Get today's date and subtract 7 days
        $startDate = now()->subDays(7)->startOfDay();
        $endDate = now()->endOfDay();

        // Fetch user creation counts within the date range
        $userCounts = $this->userRepository->getUserCreationCounts($startDate, $endDate);

        return $this->respondSuccess($userCounts, "User creation counts for the last 7 days.");
    }

    public function getUserCounts()
    {
        // Get today's date
        $today = Carbon::today()->toDateString();

        $usersToday = User::whereDate('created_at', $today)->count();

        $totalUsers = User::count();

        // Prepare the response data
        return response()->json([
            'statusCode' => 200,
            'message' => 'User counts for today and overall total.',
            'status' => true,
            'response' => [
                'users_today' => $usersToday,
                'total_users' => $totalUsers
            ],
        ]);
    }
}
