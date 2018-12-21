<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert(
            [
            [
            'name'=>'Quần bá bong',
            'price'=>'12548',
            'cate_id'=>2
        ],[
            'name'=>'Quần bá boeng',
            'price'=>'12547',
            'cate_id'=>2
        ]]
        );
        // $this->call(UsersTableSeeder::class);
    }
}
