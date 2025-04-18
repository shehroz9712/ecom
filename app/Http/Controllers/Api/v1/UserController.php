<?php

namespace App\Http\Controllers\Api\v1;


use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\UserUpdateProfileRequest;
use App\Http\Requests\UserPasswordUpdateRequest;
use App\Http\Requests\UserEmailUpdateRequest;
use App\Http\Requests\UserSummeryUpdateRequest;
use App\Http\Requests\UserTechnicalSkillsRequest;
use App\Http\Requests\UserSoftSkillsRequest;
use App\Models\UserSkill;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{
    public function index(): JsonResponse
    {
        $user = User::with([
            'details.package',
            'country',
            'state',
            'city',
            'referals',
            'userSkills',

        ])
            ->withCount([
                'awards',
                'certificates',
                'experiences',
                'languages',
                'educations',
                'references',
                'referals'
            ])
            ->where('id', Auth::id())
            ->first();
        return $this->respondSuccess($user, 'Users fetched successfully!');
    }

    // public function get_permission(): JsonResponse
    // {
    //     $user = Auth::user();


    //     $permissions = $user->getAllPermissions()->pluck('name'); // Fetching permission names

    //     return $this->respondSuccess($user, 'Permission fetched successfully!');
    // }
    public function get_permission(): JsonResponse
    {
        $user = Auth::user();

        // Fetch only the permissions assigned to the user
        $permissions = $user->getAllPermissions()
            ->groupBy('parent_id') // Group permissions under their parent (module)
            ->map(function ($permissions, $parentId) {
                $module = Permission::find($parentId); // Get module (parent permission)

                if ($module) {
                    return [
                        'module' => $module->name,
                        'permissions' => $permissions->pluck('name')->toArray()
                    ];
                }
            })
            ->filter() // Remove null values (modules without permissions)
            ->values(); // Reset array keys

        return $this->respondSuccess($permissions, 'Permissions fetched successfully!');
    }

    public function soft_skills()
    {
        $user = Auth::user();
        $soft_skills = $user->softSkills()->with('skillable')->get()->pluck('skillable');

        return $this->respondSuccess($soft_skills, 'soft skills fetched successfully!');
    }

    public function technical_skills()
    {
        $user = Auth::user();
        $soft_skills = $user->technicalSkills()->with('skillable')->get()->pluck('skillable');

        return $this->respondSuccess($soft_skills, 'technical skills fetched successfully!');
    }

    public function experiences()
    {
        $user = Auth::user();
        $experiences = $user->experiences()->get();

        return $this->respondSuccess($experiences, 'experiences fetched successfully!');
    }

    public function educations()
    {
        $user = Auth::user();
        $educations = $user->educations()->get();

        return $this->respondSuccess($educations, 'educations fetched successfully!');
    }

    public function languages()
    {
        $user = Auth::user();
        $languages = $user->languages()->get();

        return $this->respondSuccess($languages, 'languages fetched successfully!');
    }

    public function certificates()
    {
        $user = Auth::user();
        $certificates = $user->certificates()->get();

        return $this->respondSuccess($certificates, 'certificates fetched successfully!');
    }

    public function awards()
    {
        $user = Auth::user();
        $awards = $user->awards()->get();

        return $this->respondSuccess($awards, 'awards fetched successfully!');
    }

    public function references()
    {
        $user = Auth::user();
        $references = $user->references()->get();

        return $this->respondSuccess($references, 'references fetched successfully!');
    }

    public function update(UserUpdateProfileRequest $request)
    {
        try {
            $user = Auth::user();
            $inputs = $request->validated();

            // Ensure first and last name exist before concatenation
            $inputs['name'] = trim(($inputs['first_name'] ?? '') . ' ' . ($inputs['last_name'] ?? ''));

            // Extract job_title & experience before unsetting
            $detailsUpdate = [
                'job_title'  => $inputs['job_title'] ?? $user->details->job_title,
                'experience' => $inputs['experience'] ?? $user->details->experience,
            ];

            // Remove them from $inputs before updating user
            unset($inputs['job_title'], $inputs['experience']);

            // Update user
            $user->update($inputs);

            // Update user details if it exists
            if ($user->details) {
                $user->details->update($detailsUpdate);
            }

            return $this->respondSuccess(User::with('details', 'country', 'state', 'city')->find($user->id), 'Profile updated successfully!');
        } catch (\Exception $ex) {
            return $this->respondWithError([], false, $ex->getMessage());
        }
    }

    public function change_password(UserPasswordUpdateRequest $request)
    {
        try {
            $user = Auth::user();
            $inputs = $request->validated();

            if (!Hash::check($inputs['old_password'], $user->password)) {
                return $this->respondWithError([], false, 'Current password is incorrect!');
            }

            if (Hash::check($inputs['password'], $user->password)) {
                return $this->respondBadRequest([], false, 'You cannot use your old password as the new one. Please choose a different password.');
            }

            $user->update([
                'password' => Hash::make($inputs['password']),
            ]);

            return $this->respondSuccess(User::with('details', 'country', 'state', 'city')->find($user->id), 'Password changed successfully!');
        } catch (\Exception $ex) {
            return $this->respondWithError([], false, $ex->getMessage());
        }
    }

    public function change_email(UserEmailUpdateRequest $request)
    {
        try {
            $user = Auth::user();
            $inputs = $request->validated();
            $user->update([
                'email' => $inputs['email'],
            ]);

            return $this->respondSuccess(User::select('id', 'name', 'email')->find($user->id), 'Email changed successfully!');
        } catch (\Exception $ex) {
            return $this->respondWithError([], false, $ex->getMessage());
        }
    }

    public function update_summary(UserSummeryUpdateRequest $request)
    {
        try {
            $user = Auth::user();
            $inputs = $request->validated();

            $user->details->update($inputs);

            return $this->respondSuccess(User::with('details')->find($user->id), 'Summery changed successfully!');
        } catch (\Exception $ex) {
            return $this->respondWithError([], false, $ex->getMessage());
        }
    }

    public function add_technical_skills(UserTechnicalSkillsRequest $request)
    {
        try {
            $user = Auth::user();
            $inputs = $request->validated();
            $newTechnicalSkills = $inputs['technical_skills'];

            // Get current skill IDs
            $currentSkills = UserSkill::where('user_id', $user->id)
                ->where('skillable_type', 'App\Models\TechnicalSkill')
                ->pluck('skillable_id')
                ->toArray();

            // Determine which skills to remove (not in the new list)
            $skillsToRemove = array_diff($currentSkills, $newTechnicalSkills);
            UserSkill::where('user_id', $user->id)
                ->where('skillable_type', 'App\Models\TechnicalSkill')
                ->whereIn('skillable_id', $skillsToRemove)
                ->delete();

            // Determine which skills to add (not already in the DB)
            $skillsToAdd = array_diff($newTechnicalSkills, $currentSkills);
            foreach ($skillsToAdd as $skillId) {
                UserSkill::create([
                    'user_id' => $user->id,
                    'skillable_id' => $skillId,
                    'skillable_type' => 'App\Models\TechnicalSkill',
                ]);
            }

            // Return updated skills
            return $this->respondSuccess(
                $user->technicalSkills()->with('skillable')->get()->pluck('skillable'),
                'Technical skills updated successfully!'
            );
        } catch (\Exception $ex) {
            return $this->respondWithError([], false, $ex->getMessage());
        }
    }

    public function add_soft_skills(UserSoftSkillsRequest $request)
    {
        try {
            $user = Auth::user();
            $inputs = $request->validated();
            $newTechnicalSkills = $inputs['soft_skills'];

            // Get current skill IDs
            $currentSkills = UserSkill::where('user_id', $user->id)
                ->where('skillable_type', 'App\Models\SoftSkill')
                ->pluck('skillable_id')
                ->toArray();

            // Determine which skills to remove (not in the new list)
            $skillsToRemove = array_diff($currentSkills, $newTechnicalSkills);
            UserSkill::where('user_id', $user->id)
                ->where('skillable_type', 'App\Models\SoftSkill')
                ->whereIn('skillable_id', $skillsToRemove)
                ->delete();

            // Determine which skills to add (not already in the DB)
            $skillsToAdd = array_diff($newTechnicalSkills, $currentSkills);
            foreach ($skillsToAdd as $skillId) {
                UserSkill::create([
                    'user_id' => $user->id,
                    'skillable_id' => $skillId,
                    'skillable_type' => 'App\Models\SoftSkill',
                ]);
            }

            // Return updated skills
            return $this->respondSuccess(
                $user->softSkills()->with('skillable')->get()->pluck('skillable'),
                'Soft skills updated successfully!'
            );
        } catch (\Exception $ex) {
            return $this->respondWithError([], false, $ex->getMessage());
        }
    }

    public function get_technical_skills()
    {
        try {
            $user = Auth::user();

            $skills = $user->technicalSkills()
                ->with('skillable') // eager load the actual skill model (TechnicalSkill)
                ->get()
                ->pluck('skillable'); // extract the related models only

            return $this->respondSuccess($skills, 'Technical skills retrieved successfully!');
        } catch (\Exception $ex) {
            return $this->respondWithError([], false, $ex->getMessage());
        }
    }
    public function get_soft_skills()
    {
        try {
            $user = Auth::user();

            $skills = $user->softSkills()
                ->with('skillable') // eager load the actual skill model (SoftSkill)
                ->get()
                ->pluck('skillable');

            return $this->respondSuccess($skills, 'Soft skills retrieved successfully!');
        } catch (\Exception $ex) {
            return $this->respondWithError([], false, $ex->getMessage());
        }
    }
}
