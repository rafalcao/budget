<?php

use Illuminate\Database\Seeder;
use App\TagsType;


class TagsTypeSampleSeeders extends Seeder
{

    public function run()
    {
        DB::table('tags_type')->truncate();
        $this->createTagsTypeSamples();
    }

    public function createTagsTypeSamples()
    {
        $samples = $this->getSamples();

        foreach ($samples as $sample){
            TagsType::create($sample);
        }
    }

    public function getSamples()
    {
        return array(
            array(
                'code'      => 'fixa',
                'label'     => 'Fixa'
            ),
            array(
                'code'      => 'variavel',
                'label'     => 'Variável'
            ),
            array(
                'code'      => 'receita',
                'label'     => 'Receita'
            )
        );
    }
}
