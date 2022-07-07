<?php

namespace Database\Seeders;

use App\Models\Admin\Alergia;
use Illuminate\Database\Seeder;

class AlergiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alergia = [
            'Aipo e produtos à base de aipo', 
            'Alergia a ácaros',
            'Alergia a animais',
            'Alergia a fungos',
            'Alergia a pólen',
            'Alergia ao látex',
            'Alergia dermatológica - Dermatite atópica',
            'Alergia dermatológica - Dermatite de contato',
            'Alergia dermatológica – Estrófulo',
            'Alergia dermatológica – Urticária',
            'Alergia medicamentosa',
            'Alergia ocular - conjuntivite alérgica',
            'Alergia respiratória – Asma',
            'Alergia respiratória - Rinite alérgica',
            'Amendoins e produtos à base de amendoins',
            'Camarão e produtos à base de camarão',
            'Cereal – aveia',
            'Cereal – centeio',
            'Cereal – cevada',
            'Cereal – espelta',
            'Cereal – kamut',
            'Cereal – trigo',
            'Cereal – trigo Khorasan',
            'Dióxido de enxofre',
            'Fruto - amêndoas',
            'Fruto – avelãs', 
            'Fruto - castanhas de caju',
            'Fruto - castanhas do Brasil',
            'Fruto - nozes',
            'Fruto - nozes de macadâmia',
            'Fruto - nozes de Queensland',
            'Fruto - nozes pécan',
            'Fruto – pistácios',
            'Leite e produtos à base de leite (incluindo lactose)',
            'Moluscos e produtos à base de moluscos',
            'Mostarda e produtos à base de mostarda',
            'Outros produtos a base de cereais',
            'Outros produtos a base de frutos de casca rija',
            'Ovos e produtos à base de ovos',
            'Peixes e frutos do mar (Crustáceos)', 
            'Peixes e produtos à base de peixe',
            'Sementes de sésamo e produtos à base de sementes de sésamo',
            'Soja e produtos à base de soja',
            'Tremoço ou produtos à base de tremoço',
        ];

        for($i = 0; $i <= 43; $i++)
        {
            $dados = ['alergia' => $alergia[$i]];
            Alergia::create($dados);
        }
    }
}
