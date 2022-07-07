<?php

namespace Database\Seeders;

use App\Models\Admin\TipoUser;
use Illuminate\Database\Seeder;

class TipoUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $funcao = ['Administrador',  'Medico',  'Fisioterapeuta', 'Secretaria'];

        for($i = 0; $i <= 3; $i++)
        {
            $dados = ['funcao' => $funcao[$i]];
            TipoUser::create($dados);
        }
    }
}
