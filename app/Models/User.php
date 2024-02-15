<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\FileDoc;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\HasMedia;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\InteractsWithMedia;


class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasFactory, HasApiTokens, Notifiable, HasRoles, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */  
    protected $fillable = [
      
        'username',
        'name',
        'name_en',
        'phone_number',
        'status',
        'banned',
        'email',
        'password',
        'company_id',
        'user_type', // Ensure this is included
        'personal_photo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->name_en;
    }

    public function userProfile() {
        return $this->hasOne(UserProfile::class, 'user_id', 'id');
    }

    
    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    ////In your User model, define a relationship to Property:

    public function properties()
    {
        return $this->hasMany(Property::class, 'employee_id');
    }
   
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function filedoc()
    {
        return $this->hasMany(FileDoc::class);
    }

    public function followedCompanies()
    {
        return $this->belongsToMany(Company::class, 'company_user', 'user_id', 'company_id')->withTimestamps();
    }


}
