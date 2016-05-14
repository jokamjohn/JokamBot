<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messenger extends Model
{
    protected $fillable = [ "senderId", "recipientId", "pageId", "timestamp","message"];
}
