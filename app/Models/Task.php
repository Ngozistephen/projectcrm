<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'client_id',
        'project_id',
        'deadline',
        'status'
    ];

    public const STATUS = ['open', 'in progress', 'pending', 'waiting client', 'blocked', 'closed'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function project ()
    {
        return $this->belongsTo(Project::class);
    }


    //  Eloquent Query Scope 
    public function scopeFilterStatus($query, $filter)
    {
        if (in_array($filter, self::STATUS)) {
            return $query->where('status', $filter);
        }

        return $query;
    }
}
