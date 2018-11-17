<?php

use Illuminate\Database\Seeder;
use \App\Language;
use \App\Level;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            'english',
            'arabic'
        ];

        

        foreach ($languages as $language) {

            $newLanguage = Language::where('language', $language)->first();

            if($newLanguage === null){
                $newLanguage = Language::create([
                    'language' => $language
                ]);
                
            }
        }
    }
}
