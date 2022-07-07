<?php

namespace Database\Seeders;

use App\Models\Admin\Especialidade;
use Illuminate\Database\Seeder;

class EspecialidadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $especialidade = [
            'Acupuntura', 
            'Alergia e Imunologia', 
            'Anatomia Patológica', 
            'Anestesiologia', 
            'Angiologia e Cirurgia Vascular', 
            'Cancerologia',
            'Cardiologia', 
            'Cardiologia Pediátrica', 
            'Cirurgia Cardíaca', 
            'Cirurgia da Mão',
            'Cirurgia de Cabeça e Pescoço',
            'Cirurgia do Aparelho Digestivo',
            'Cirurgia Geral',
            'Cirurgia Pediátrica',
            'Cirurgia Plástica Recostrutiva e Estética',
            'Cirurgia Torácica',
            'Cirurgia Vascular',
            'Clínica Médica',
            'Coloproctologia',
            'Dermatologia',
            'Doenças Infeciosas',
            'Endocrinologia e Metabologia',
            'Endoscopia',
            'Estomatologia',
            'Gastroenterologia',
            'Genética Médica',
            'Geriatria',
            'Ginecologia e Obstetrícia',
            'Hematologia e Hemoterapia',
            'Homeopatia',
            'Imunoalergologia',
            'Imuno-hemoterapia',
            'Infectologia',
            'Mastologia',
            'Medicina Desportiva',
            'Medicina do Trabalho',
            'Medicina de Tráfego',
            'Medicina Física e Reabilitação',
            'Medicina Geral e Familiar',
            'Medicina Intensiva',
            'Medicina Interna',
            'Medicina Legal e Perícia Médica',
            'Medicina Nuclear',
            'Medicina Preventiva e Social',
            'Medicina Tropical',
            'Nefrologia',
            'Neurocirurgia',
            'Neurologia',
            'Neurorradiologia',
            'Nutrologia',
            'Oftalmologia',
            'Oncologia Médica',
            'Ortopedia e Traumatologia',
            'Otorrinolaringologia',
            'Patologia',
            'Patologia Clínica/Medicina Laboratorial',
            'Pediatria',
            'Pneumologia',
            'Psiquiatria',
            'Psiquiatria da Infância e da Adolescência',
            'Radiologia e Diagnóstico por Imagem',
            'Radioncologia',
            'Radioterapia',
            'Reumatologia',
            'Saúde Pública',
            'Urologia',
        ];

        for($i = 0; $i <= 65; $i++)
        {
            $dados = ['especialidade' => $especialidade[$i]];
            Especialidade::create($dados);
        }
    }
}
