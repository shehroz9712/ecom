<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\HasQueryFilters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes, Notifiable, HasRoles, HasApiTokens,HasQueryFilters;


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [];
    protected $appends = ['role_names','user_image'];

    public static function allowedColumns(): array
    {
        return [
            'name',
            'description',
            'status',
            'type',
            'duration',
            'start_date',
        ];
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    /**
     * Get the package that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }



    /**
     * Get the awards for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function awards()
    {
        return $this->hasMany(Award::class);
    }

    /**
     * Get the certificates for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function certificates()
    {
        return $this->hasMany(Certification::class);
    }

    /**
     * Get the resumes for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function resumes()
    {
        return $this->hasMany(Resume::class);
    }

    /**
     * Get the experiences for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    /**
     * Get the languages for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function languages()
    {
        return $this->hasMany(Language::class);
    }

    /**
     * Get the educations for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function getRoleNamesAttribute()
    {
        return $this->roles->pluck('name'); // Get role names as an array
    }

    public function image()
    {
        return $this->belongsTo(Media::class, 'image_id');
    }

    public function references()
    {
        return $this->hasMany(Reference::class);
    }

    public function details()
    {
        return $this->hasOne(UserDetails::class);
    }
    public function userSkills()
    {
        return $this->hasMany(UserSkill::class);
    }

    public function softSkills()
    {
        return $this->hasMany(UserSkill::class)
            ->where('skillable_type', SoftSkill::class)
            ->with('skillable'); // Ensure skill name is loaded
    }

    public function technicalSkills()
    {
        return $this->hasMany(UserSkill::class)
            ->where('skillable_type', TechnicalSkill::class)
            ->with('skillable'); // Ensure skill name is loaded
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Check if the user has any of the given roles.
     *
     * @param array $roles
     * @return bool
     */
    public function hasAnyRole(array $roles): bool
    {
        foreach ($roles as $role) {
            if ($this->hasRole($role)) {
                return true;
            }
        }
        return false;
    }



    public function referals()
    {
        return $this->hasMany(User::class, 'referral_by', 'id')
            ->where('referral_by', '!=', 1)
            ->whereColumn('referral_by', '!=', 'id'); // Ensures referral_by is not the same as user ID
    }

    public function imageMedia()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }

    public function getUserImageAttribute()
    {
        return $this->imageMedia?->name ??  $this->imageMedia?->url;
    }
}
