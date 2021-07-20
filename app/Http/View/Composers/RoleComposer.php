<?php

namespace App\Http\View\Composers;

use App\Models\Role;
use Illuminate\View\View;

class RoleComposer
{

  public $roles;

  public function __construct(Role $roles)
  {
    $this->roles = $roles;
  }

  public function compose (View $view) 
  {
    $view->with('roles', $this->roles->all());
  }
}
