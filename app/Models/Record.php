<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'attendance', 'leave','user_id'];

    public function users()
    {
        return $this->belongsto(User::class);
    }

    public function scopeWhereDate($query, $search_date)
    {
        if(!empty($search_date)){
            $query->where('date', 'LIKE', $search_date);
        }
    }

    public function scopeWhereAttn($query, $search_attn_from, $search_attn_to)
    {
        if(!empty($search_attn_from) && !empty($search_attn_to)){
            $query->whereBetween('attendance',[$search_attn_from, $search_attn_to] );
        }  
    } 

    public function scopeWhereLve($query, $search_lve_from, $search_lve_to)
    {
        if(!empty($search_lve_from) && !empty($search_lve_to)){
            $query->whereBetween('leave',[$search_lve_from, $search_lve_to] );
        }
    }
}
