<?php

namespace App\Handlers;
use Illuminate\Support\Facades\Auth;

class LfmConfigHandler extends \UniSharp\LaravelFilemanager\Handlers\ConfigHandler
{
    public function userField()
    {
      $name = auth()->user()->name;
      $name_slug = Str::slug($name, '_');
      $role = auth()->user()->role;

        if($role == "superadmin"){
          return 'superadmin';
        }else{
          return 'superadmin/'.$name_slug;
        }
    }
}
