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
        $listaStatus = ['A fazer', 'Em andamento', 'Concluido'];
    	foreach ($listaStatus as $statu) {
    		$status = new Status();
    		if ($status->all()->count() < 1) {
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
