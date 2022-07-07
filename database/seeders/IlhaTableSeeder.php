<?php

namespace Database\Seeders;

use App\Models\Admin\Ilha;
use Illuminate\Database\Seeder;

class IlhaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ilha = ['Santo Antão',  'São Vicente',  'São Nicolau',
                'Sal','Boa Vista','Maio','Santiago','Fogo','Brava',
        ];

        for($i = 0; $i <= 8; $i++)
        {
            $dados = ['nome' => $ilha[$i]];
            Ilha::create($dados);
        }
    }
}
