<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // 挿入可能なカラムの定義
    public $fillable = [
        'id',
        'user_id',
        'post',
        'created_at',
        'updated_at'
    ];

    // 投稿に関連するユーザーを定義
    public function user() {
        return $this->belongsTo(User::class);
    }

}
