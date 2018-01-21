<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{

    const IS_ALLOW = 1;
    const IS_NOALLOW = 0;

    //
    public function post() {
        return $this->hasOne(Post::class);
    }

    public function author() {
        return $this->hasOne(User::class);
    }

    public function allow()
    {
      # code...
      $this->status = Comment::IS_ALLOW;
      $this->save();
    }

    public function disAllow($value='')
    {
      # code...
      $this->status = IS_ALLOW;
      $this->save();
    }

    public function toggleStatus()
    {
      # code...
      if ($this->status = 0) {
        # code...
        return $this->Allow();
      }
      return $this->disAllow() ;
    }

    public function remove()
    {
      # code...
      $this->delete();
    }
}
