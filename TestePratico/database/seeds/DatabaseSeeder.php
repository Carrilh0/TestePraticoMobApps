<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Status;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $status = new Status();
        if ($status->all()->count() < 1) {
            $listaStatus = ['A fazer', 'Em andamento', 'Concluido'];
            foreach ($listaStatus as $statu) {		
                    $status->create(['nome' => $statu]);
                }
         }

    	$listaUsuario = [
    		'name' => 'Admin',
    		'email' => 'admin@admin.com',
    		'password' => bcrypt('admin')
    	];

    	$user = new User();
    	if ($user->all()->count() < 1) {
    		$user->create($listaUsuario);
    	}
    }
}
