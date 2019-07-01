<?php

use Illuminate\Database\Seeder;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Admin',
            'description' => 'As an Admin incharge of the entire site. you have the power to do and undo',
            
        ]);
        DB::table('roles')->insert([
            'name' => 'Editor',
            'description' => 'As an editor, you view peoples work, make necessary correction and more.',
            
        ]);
        DB::table('roles')->insert([
            'name' => 'Anonymous user',
            'description' => 'Check on site, download articles and go',
            
        ]);
    }
}
