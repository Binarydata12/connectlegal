<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'group_id'
    ];

    public function member() {
        return $this->belongsTo(User::class, 'member_id');
    }

    public function group() {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function totalMembers($id) {
        return GroupMember::whereGroupId($id)->count();
    }

    public function getProfilePic($id) {
        return Lawyer::whereUserId($id)->first()->value('profile_pic');
    }
}
