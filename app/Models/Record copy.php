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

    public static function searchAttn(Request $request)
    {
        $search_attn_from = $request->input('search_attn_from');
        $search_attn_to = $request->input('search_attn_to');
        $attntime = Record::whereBetween('attendance',[$search_attn_from, $search_attn_to] )->get();
        return $attntime;
    }

    public static function searchLve(Request $request)
    {
        $search_lve_from = $request->input('search_lve_from');
        $search_lve_to = $request->input('search_lve_to');
        $lvetime = Record::whereBetween('leave',[$search_lve_from, $search_lve_to] )->get();
        return $lvetime;
    }
}
