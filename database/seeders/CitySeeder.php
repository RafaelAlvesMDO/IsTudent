<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            'Rio Branco',
            'Maceió',
            'Macapá',
            'Manaus',
            'Salvador',
            'Fortaleza',
            'Brasília',
            'Vitória',
            'Goiânia',
            'São Luís',
            'Cuiabá',
            'Campo Grande',
            'Belo Horizonte',
            'Belém',
            'João Pessoa',
            'Curitiba',
            'Recife',
            'Teresina',
            'Rio de Janeiro',
            'Natal',
            'Porto Alegre',
            'Porto Velho',
            'Boa Vista',
            'Florianópolis',
            'São Paulo',
            'Aracaju',
            'Palmas',
        ];

        foreach ($cities as $cityName) {
            City::firstOrCreate(['name' => $cityName]);
        }
    }
}
