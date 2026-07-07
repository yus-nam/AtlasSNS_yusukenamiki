<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $fillable = [
        'follower_id',
        'following_id',
    ];

    /** 以下追記 */
    protected $table = 'follows';


    // フォロワーを取得
    public function follower()
    {
        return $this->belongsTo(User::class, 'follower_id'); // フォロワーはUserモデルへの一つの関連
    }

    // フォローされたユーザーを取得
    public function following()
    {
        return $this->belongsTo(User::class, 'following_id'); // フォローされたユーザーはUserモデルへの一つの関連
    }







}
