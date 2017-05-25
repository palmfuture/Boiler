<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

/**
 * Class UserTableSeeder.
 */
class UserTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate(config('access.users_table'));

        //Add the master administrator, user id of 1
        $users = [
            [
                'first_name'        => 'Admin',
                'last_name'         => 'Istrator',
                'username'          => 'admin',
                'email'             => 'admin@admin.com',
                'tel'               => '076123456',
                'password'          => bcrypt('1234'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'facebook'         => '100002420637495',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
        ];

        DB::table(config('access.users_table'))->insert($users);

        $this->enableForeignKeys();
    }
}
