<?php

use Illuminate\Database\Seeder;

class RootSeeder extends Seeder
{

    public $user;
    public $role;

    public function __construct(\App\Repositories\UserRepository $user, \App\Repositories\RoleRepository $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = $this->user->findBy('name', 'root');
        if (!$user) {
            $user = $this->user->create([
                'name' => 'root',
                'email' => 'admin@admin.com',
                'password' => bcrypt('secret'),
                'status' => 1
            ]);
            $role = $this->role->create([
                'name' => 'root',
                'description' => '超级管理员',
            ]);
            $user->roles()->attach($role);
        } else {
            dump('root exists');
        }
    }
}
