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
        $rootName = env('ROOT_NAME', 'root');
        $rootEmail = env('ROOT_EMAIL', 'admin@admin.com');
        $rootPassword = env('ROOT_PASSWORD', 'secret');
        $user = $this->user->findBy('email', $rootEmail);
        if (!$user) {
            $user = $this->user->create([
                'name' => $rootName,
                'email' => $rootEmail,
                'password' => bcrypt($rootPassword),
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
