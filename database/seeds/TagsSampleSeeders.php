<?php

use App\TagsSample;
use Illuminate\Database\Seeder;

class TagsSampleSeeders extends Seeder
{

    public function run()
    {
        DB::table('tags_sample')->truncate();
        $this->createTagsSamples();
    }

    public function createTagsSamples()
    {
        $samples = $this->getSamples();

        foreach ($samples as $sample){
            TagsSample::create($sample);
        }
    }

    public function getSamples()
    {
        return array(
            array(
                'name'    => 'Habitação (Condomínio, luz, água, gás, TV, IPTU, financiamento)',
                'type'    => 'fixa'
            ),
            array(
                'name'    => 'Comunicação (Conta celular/telefone fixo)',
                'type'    => 'fixa'
            ),
            array(
                'name'    => 'Educação (Faculdade, cursos, livros, etc)',
                'type'    => 'fixa'
            ),
            array(
                'name'    => 'Carro (IPVA, seguro, estacionamento mensal, etc)',
                'type'    => 'fixa'
            ),
            array(
                'name'    => 'Saúde (Planos, terapia, academia, personal, etc)',
                'type'    => 'fixa'
            ),
            array(
                'name'    => 'Banco (Tarifas, anuidades, etc)',
                'type'    => 'fixa'
            ),
            array(
                'name'    => 'Outras (Adicione uma descrição complementar)',
                'type'    => 'fixa'
            ),
            array(
                'name'    => 'Habitação (Mercado, padaria, utensílios, manutenções, etc)',
                'type'    => 'variavel'
            ),
            array(
                'name'    => 'Alimentação (Café, almoço, lanche, janta, ceia, etc)',
                'type'    => 'variavel'
            ),
            array(
                'name'    => 'Carro (Gasolina, estacionamento, manutenção, pedágio, etc)',
                'type'    => 'variavel'
            ),
            array(
                'name'    => 'Lazer (Restaurantes, bares, cinema, eventos, etc)',
                'type'    => 'variavel'
            ),
            array(
                'name'    => 'Saúde (Medicamenos, médico, suplementos, etc)',
                'type'    => 'variavel'
            ),
            array(
                'name'    => 'Vestuário (Roupas, sapatos, bolsas, etc)',
                'type'    => 'variavel'
            ),
            array(
                'name'    => 'Educação (Livro, cursos, livros, etc)',
                'type'    => 'variavel'
            ),
            array(
                'name'    => 'Presetes (Aniversário, natal, etc)',
                'type'    => 'variavel'
            ),
            array(
                'name'    => 'Transporte (Uber, 99, metrô, ônibus, taxi, etc)',
                'type'    => 'variavel'
            ),
            array(
                'name'    => 'Viagem (Passagem, hotel, transporte, pacotes, etc)',
                'type'    => 'variavel'
            ),
            array(
                'name'    => 'Pet (Veterinário, ração, banho, remédio, vacinas, etc)',
                'type'    => 'variavel'
            ),
            array(
                'name'    => 'Estética (Corte de cabelo, massagem, etc)',
                'type'    => 'variavel'
            ),
            array(
                'name'    => 'Outras (Adicione uma descrição complementar)',
                'type'    => 'variavel'
            )
        );
    }
}
