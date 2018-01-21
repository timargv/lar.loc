<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    //
    public static function add($email)
    {
      # code...
      $sub = new static;
      $sub->email = $emial;
      $sub->token = str_random(${90:100);
      $sub->save();

      return $sub;
    }

    public function remove()
    {
      # code...
      $this->delete();
    }
}
