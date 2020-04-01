<?php

use Illuminate\Database\Seeder;
use App\Models\Commercial\CommercialItem;

class CommercialItemOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $items = CommercialItem::all();
        foreach($items as $item) {
            $shape = array();
            $orientation = array();
            $fold = array();
            $type = array();
            
            switch(strtolower($item->name)) {
                case 'business card': 
                    $shape = [
                        (object)['en' => 'Standard', 'ar' => 'اساسي']
                    ];
                    $orientation = [
                        (object)['en' => 'Horizontal', 'ar' => 'عرضي'],
                        (object)['en' => 'Vertical', 'ar' => 'عمودي']
                    ];
                break; 

                case 'flyer': 
                    // $shape = ['Standard'];
                    $orientation = [
                        (object)['en' => 'Horizontal', 'ar' => 'عرضي'],
                        (object)['en' => 'Vertical', 'ar' => 'عمودي']
                    ];
                break;

                case 'poster': 
                    // $shape = ['Standard'];
                    $orientation = [
                        (object)['en' => 'Vertical', 'ar' => 'عمودي'],
                        (object)['en' => 'Horizontal', 'ar' => 'عرضي']  
                    ];
                break; 

                case 'envelope A4':
                    
                break; 

                case 'brochure': 
                    $fold = [
                        (object)['en' => 'bi-fold', 'ar' => 'ثنائية الطي'],
                        (object)['en' => 'tri-fold', 'ar' => 'ثلاثي أضعاف'],
                        (object)['en' => 'z-fold', 'ar' => 'ض أضعاف']
                    ];

                break; 

                case 'envelope dl': 

                break;

                case 'stickers':
                    $shape = [
                        (object)['en' => 'Circle', 'ar' => 'دائرة'],
                        (object)['en' => 'Oval', 'ar' => 'شكل بيضوي'],
                        (object)['en' => 'Rounded Rectangle', 'ar' => 'مستطيل مستدير الزوايا'],
                        (object)['en' => 'Rounded Square', 'ar' => 'مربع مستدير']
                    ];

                    // $orientation = ['Horizontal', 'Vertical'];
                    $orientation = [
                        (object)['en' => 'Horizontal', 'ar' => 'عرضي'],
                        (object)['en' => 'Vertical', 'ar' => 'عمودي']
                    ];
                break; 

                case 'roll up': 
                    // $type = ['Table Top', 'Roll up'];
                    $type = [
                        (object)['en' => 'Table Top', 'ar' => 'سطح الطاولة'],
                        (object)['en' => 'Roll up', 'ar' => 'نشمر']
                    ];
                break;

                case 'folder': 
                break; 

                case 'invitations': 
                    // $shape = ['Standard'];
                    $shape = [
                        (object)['en' => 'Standard', 'ar' => 'اساسي']
                    ];

                    // $orientation = ['Horizontal', 'Vertical'];
                    $orientation = [
                        (object)['en' => 'Horizontal', 'ar' => 'عرضي'],
                        (object)['en' => 'Vertical', 'ar' => 'عمودي']
                    ];
                break; 

                case 'letter head': 

                break;

                case 'table tent': 
                break;

                case 'banners': 
                    // $orientation = ['Horizontal', 'Vertical'];
                    $orientation = [
                        (object)['en' => 'Horizontal', 'ar' => 'عرضي'],
                        (object)['en' => 'Vertical', 'ar' => 'عمودي']
                    ];
                break;

                case 'calendar': 
                    // $type = ['Wall Calendar', 'Table Top Calendar', 'Triangle Calendar'];
                    $type = [
                        (object)['en' => 'Wall Calendar', 'ar' => 'تقويم الحائط'],
                        (object)['en' => 'Table Top Calendar', 'ar' => 'التقويم أعلى الجدول'],
                        (object)['en' => 'Triangle Calendar', 'ar' => 'التقويم المثلث']
                    ];
                break;

                case 'pop up': 

                break;

                case 'booklet':
                break;

                default: 
                break;

            }
            
            $data = array(
                'shape' => $shape, 
                'orientation' => $orientation, 
                'fold' => $fold, 
                'type' => $type
            );
            $item->options_info = $data;
            $item->save();
        }
    }
}
