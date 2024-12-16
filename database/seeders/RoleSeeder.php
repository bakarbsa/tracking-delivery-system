<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
  public function run()
  {
    $roles = [
      [
          'id' => 1,
          'title' => 'admin',
      ],
      [
          'id' => 2,
          'title' => 'user',
      ],
    ];
    
    Role::insert($roles);

    Permission::insert($this->userPermission()->toArray());
    Permission::insert($this->locationPermission()->toArray());

    $allPermissions = [
      ...$this->userPermission()->select('id')->flatten(),
      ...$this->locationPermission()->select('id')->flatten(),
    ];

    // Set admin permission
    Role::findOrFail(1)->permissions()->sync($allPermissions);
    
    // Set user permission
    Role::findOrFail(2)->permissions()->sync([3]);
  }

  private function userPermission()
  {
    return collect([
      [
          'id' => 1,
          'title' => 'user_read',
      ],
      [
          'id' => 2,
          'title' => 'user_create',
      ],
      [
          'id' => 3,
          'title' => 'user_edit',
      ],
      [
          'id' => 4,
          'title' => 'user_destroy',
      ],
    ]);
  }

  private function locationPermission()
  {
    return collect([
      [
          'id' => 5,
          'title' => 'location_read',
      ],
      [
          'id' => 6,
          'title' => 'location_create',
      ],
      [
          'id' => 7,
          'title' => 'location_edit',
      ],
      [
          'id' => 8,
          'title' => 'location_destroy',
      ],
    ]);
  }
}