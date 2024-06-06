<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Museum;


class MuseumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
        museum_id          id          not null  constraint pk_museum primary key,
        museum_name        name_middle not null,
        museum_code        name_short  not null,
        museum_type        museum_type not null,
        museum_description text_long,
        museum_adress      name_long   not null,
        museum_contacts    name_long   not null

        museum_type AS ENUM ('natural', 'historical', 'memorial', 'scientific', 'artistic', 'theater')
     */
    public function run(): void
    {
        $item = Museum::create([
            'museum_name' => 'Національний музей історії України',
            'museum_code' => 'CODE1',
            'museum_type' => 'historical',
            'museum_description' => 'Провідний історичний музей України, що за кількістю та значенням колекцій є одним з найзначніших музеїв країни',
            'museum_address' => ' Україна 25025 м. Київ, вул. Володимирська, 2',
            'museum_contacts' => '+38 044 280 13 96, +38 093 855 61 16'
        ]);

        $item = Museum::create([
            'museum_name' => 'Національний музей історії України у Другій світовій війні',
            'museum_code' => 'CODE2',
            'museum_type' => 'memorial',
            'museum_description' => 'Меморіальний комплекс',
            'museum_address' => ' Україна, м. Київ, Лаврська вулиця, 27',
            'museum_contacts' => ' +380 44 285 9452, warmuseum.kyiv.ua'
        ]);

        /*
        Національний художній музей України
        Національний музей літератури України
        Національний музей Тараса Шевченка
        Національний науково-дослідний реставраційний центр України
        Національний музей-заповідник українського гончарства в Опішному
        Національний музей у Львові
        Львівська галерея мистецтв
        Національний музей «Меморіал жертв Голодомору»
        Національний музей народної архітектури та побуту України
        Національний музей-меморіал жертв окупаційних режимів «Тюрма на Лонцького»
        Музей історії Десятинної церкви
        Музей науки Львів */
    }
}
