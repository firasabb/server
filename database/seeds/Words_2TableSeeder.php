<?php

use Illuminate\Database\Seeder;
use \App\Word;

class Words_2TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $oldData = DB::table('words')->get();

        foreach($oldData as $oneData){
            $word = new Word();
            $word->id = $oneData->id;
            $word->title = $oneData->title;
            $word->tagline = $oneData->tagline;
            $word->description = $oneData->description;
            $word->rating_us = $oneData->rating_us;
            $word->rating_visitors = $oneData->rating_visitors;
            $word->eligibility = $oneData->eligibility;
            $word->androidlink = $oneData->androidlink;
            $word->ioslink = $oneData->ioslink;
            $word->payment = $oneData->payment;
            $word->color = $oneData->color;
            $word->sponsored = $oneData->sponsored;
            $word->language_id = $oneData->language_id;
            $word->category_id = $oneData->category_id;
            $word->photo = $oneData->photo;
            $word->save();
        }
    }
}
