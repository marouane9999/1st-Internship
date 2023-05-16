<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles=[
            [
                'name'=>'admin',
                'guard_name'=>'web'
            ],
            [
                'name'=>'membre',
                'guard_name'=>'web'
            ],
            [
                'name'=>'controlleur',
                'guard_name'=>'web'
            ],
            [
                'name'=>'chef_equipe',
                'guard_name'=>"web"
            ],
        ];
        $users=[
            [
                'id' => 1,
                'name' => 'Marouane El Aissi',
                'email' => "iso@mail.com",
                'password'=>'marou@@',
                'roles'=>'admin',

            ],
            [
                'id' => 2,
                'name' => 'Karim Ahmadi',
                'email' => "karim@mail.com",
                'password'=>'karim@@',
                'roles'=>'membre',

            ],
            [
                'id' => 3,
                'name' => 'Amine Said',
                'email' => "amine@mail.com",
                'password'=>'amina@@',
                'roles'=>'controlleur',

            ],
            [
                'id' => 4,
                'name' => 'Ali Qassi',
                'email' => "ali@mail.com",
                'password'=>'ali@@',
                'roles'=>'chef_equipe',

            ]
        ];

//        DB::table('roles')->insert($roles);

        foreach ($users as $row) {
            $roles = $row['roles'];
            unset($row['roles']);
            $user = User::find($row['id']);
            if (!$user) {
                $user = new User;
            }
            $user->fill($row);
            $user->save();
            $user->syncRoles($roles);
        }
    }
}
