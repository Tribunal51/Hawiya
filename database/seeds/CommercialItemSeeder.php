<?php

use Illuminate\Database\Seeder;
use App\Models\Commercial\CommercialItem;

class CommercialItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $items = array(
            'BUSINESS CARD',
            'FLYER',
            'POSTER',
            'ENVELOPE A4',
            'BROCHURE',
            'ENVELOPE DL',
            'STICKERS',
            'ROLL UP',
            'FOLDER',
            'LETTER HEAD',
            'INVITATION',
            'TABLE TENT',
            'BANNER',
            'CALENDAR',
            'BOOKLET',
            'POP UP'
        );

        foreach($items as $item) {
            CommercialItem::create([
                'name' => $item->name
            ]);
        }
    }
}
