<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    const IS_BANNED = 1;
    const IS_UNBANNED = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public static function add($fields)
    {
      # code...
      $user = new static();
      $user->fill($fields);
      $user->password = bcrypt($fields['password']);
      $user->save();
      return $user;
    }

    public function edit($fields)
    {
      $user->fill($fields);
      $this->password = bcrypt($fields['password']);
      $this->save();
    }

    public function remove()
    {
      # code...
      Storage::delete('uploads/', $this->avatar);
      $this->delete();
    }

    public function uploadAvatar($avatar)
    {
      # code...
      if ($avatar == null) { return; }
      if ($this->avatar != null) {
          Storage::delete('uploads', $this->avatar);
      }
      $filename = str_random(10). '.' . $avatar->extension();
      $avatar->storeAs('uploads', $filename);
      $this->avatar = $filename;
      $this->save();

    }

    public function getAvatar()
    {
      # code...
      if ($this->avatar == null) {
        # code...
        return '/img/noavatar.png';
      }
      return '/uploads/'. $this->avatar;
    }

    public function makeAdmin()
    {
      # делаем админа ...
      $this->is_admin = 1;
    }

    public function makeNormal()
    {
      # делаем обычного пользователя ...
      $this->is_admin = 0;
    }

    public function toggleAdmin($value)
    {
      # Переключатель статуса группы пользователя ...
      if ($value == null) {
        # обычный пользователь ...
        return $this->makeNormal();
      }

      return $this->makeAdmin();
    }

    public function Banned()
    {
      # Статус забанен ...
      $this->is_ban = User::IS_BANNED;
      $this->save();
    }

    public function unBanned()
    {
      # Статус снят бан ...
      $this->is_ban = User::IS_UNBANNED;
      $this->save();
    }

    public function toggleBanned($value)
    {
      # Статус бана вкл или выкл...
      if ($value == null) {
        # code...
        return $this->Banned();
      }
      return $this->unBanned();
    }

}
