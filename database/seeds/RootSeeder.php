<?php

use Illuminate\Database\Seeder;

class RootSeeder extends Seeder
{

    public $user;
    public $role;

    public function __construct(\App\User $user, \App\Role $role)
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

        $role = $this->role->where('name', 'root')->firstOrFail();
        $rootName = env('ROOT_NAME', 'root');
        $rootEmail = env('ROOT_EMAIL', 'crisen@crisen.org');
        $rootPassword = env('ROOT_PASSWORD', 'secret');
        $user = $this->user->where('email', $rootEmail)->first();
        if ($user) {
            $user->roles()->attach($role);
            dump('root exist');
            return;
        }

        $user = $this->user->create([
            'name' => $rootName,
            'email' => $rootEmail,
            'password' => bcrypt($rootPassword),
            'status' => 1
        ]);
        $user->roles()->attach($role);
    }

}
