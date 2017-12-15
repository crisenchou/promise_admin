<?php


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ModuleSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(RootSeeder::class);
        $this->call(MenuSeeder::class);
    }
}
