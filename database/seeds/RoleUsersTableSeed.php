<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

          $items =
              [
                  [ 'id' => 1,'created_at' => NULL,'updated_at' => NULL,'user_id' => 2,'role_id' => 1]
              ];
        foreach ($items as $item){
            DB::table('user_role')->insert($item);
        }
    }
}
