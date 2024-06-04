<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }



// ローカルスコープの設定ーーーーー

public function scopeByGender($query, $gender)
    {
        if (!empty($gender)) {
            $query->where('gender', $gender);
        }
        return $query;
    }

    public function scopeByCategory($query, $category_id)
    {
        if (!empty($category_id)) {
            return $query->where('category_id', $category_id);
        }
        return $query;
    }

    public function scopeByDate($query, $date)
    {
        if (!empty($date)) {
            $query->whereDate('created_at', $date);
        }
        return $query;
    }

    public function scopeSearch($query, $searchQuery)
    {
        if (!empty($searchQuery)) {
            $query->where(function($q) use ($searchQuery) {
                $q->where('last_name', 'like', '%' . $searchQuery . '%')
                    ->orWhere('first_name', 'like', '%' . $searchQuery . '%')
                    ->orWhereRaw("CONCAT(last_name, ' ', first_name) LIKE ?", ["%{$searchQuery}%"])
                    ->orWhere('email', 'like', '%' . $searchQuery . '%');
            });
        }
        return $query;
    }

// ーーーーー

}

