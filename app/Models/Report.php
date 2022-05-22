<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'company_name',
        'phone',
        'country',
        'details'
    ];

    public function scopeFilter($query, $data)
    {
        if(isset($data['name']) && trim($data['name'] !== ''))
            $query->where('name', $data['name']);

        if(isset($data['email']) && trim($data['email'] !== ''))
            $query->where('email', $data['email']);
    }
}
