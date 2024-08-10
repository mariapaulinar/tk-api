<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'personal_id',
        'first_name',
        'last_name',
        'birth_date',
        'start_date',
        'gender',
        'company_id',
        'workplace_id',
        'position_id',
        'country_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function workplace()
    {
        return $this->belongsTo(Workplace::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->birth_date)->age;
    }

    public function getSeniorityAttribute()
    {
        return Carbon::parse($this->start_date)->diffInYears(Carbon::now());
    }
}
