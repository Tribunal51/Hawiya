<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessCard\BusinessCard;
use App\Models\BusinessCard\BusinessCardLabel;
use App\Models\BusinessCard\BusinessCardColor;
use App\Models\BusinessCard\BusinessCardLabelColor;
use App\Models\BusinessCard\BusinessCardPrice;

use Illuminate\Support\Facades\DB;

class BusinessCardsController extends Controller
{
    //

    public function index(Request $request) {
        if(isset($request->shape)) {
            $shape = $request->shape;
            $cards = BusinessCard::with('price')->where('shape', '=', $shape)->get();
            
        }
        else {
            $cards = BusinessCard::with('price')->get();
        }
        
        foreach($cards as $card) {
            $colors_big_object = BusinessCardColor::where('business_card_id', $card->id)->get();
            $colors = array();
            $preview_text_colors = array();
            foreach($colors_big_object as $color) {
                array_push($colors, $color->name);
                array_push($preview_text_colors, $color->preview_text_color);
            }
            $card->colors = $colors;
            $card->preview_text_colors = $preview_text_colors;
        }
        return $cards;

    }

    // public function index(Request $request) {
    //     // return BusinessCard::with('labels.colors')->get();
    //     // $cards = BusinessCard::with(['colors', 'prices', 'labels'])->get();
    //     // return $request;
    //     if(isset($request->shape)) {
    //         $cards = BusinessCard::with(['colors', 'price', 'labels'])->where('shape','=', $request->shape)->get();
    //         return $cards;
    //     }
       
        
    //     if(isset($request->id)) {
    //         $card = BusinessCard::with(['labels', 'colors', 'price'])->find($request->id);

    //     }
    //     if(isset($request->id)) {
    //         $card = BusinessCard::with(['labels', 'colors', 'price'])->find($request->id);
    //         if(isset($request->color)) {
    //             $joined = DB::table('business_cards')
    //                     ->join('business_card_colors', 'business_cards.id','=', 'business_card_colors.business_card_id')
    //                     ->join('business_card_label_colors', 'business_card_colors.id', '=', 'business_card_label_colors.business_card_color_id')
    //                     ->join('business_card_labels', 'business_card_labels.id', '=', 'business_card_label_colors.business_card_label_id')
    //                     ->get();
    //             // return $joined;
                
    //             foreach($card->labels as $label) {
    //                 //
    //                 // return $label->id;
    //                 // $color = $joined->where([
    //                 //     ['business_card_label_id','=',$label->id],
    //                 //     ['name', '=', $request->color]
    //                 // ])->first();
    //                 $color = DB::table('business_cards')
    //                     ->join('business_card_colors', 'business_cards.id','=', 'business_card_colors.business_card_id')
    //                     ->join('business_card_label_colors', 'business_card_colors.id', '=', 'business_card_label_colors.business_card_color_id')
    //                     ->join('business_card_labels', 'business_card_labels.id', '=', 'business_card_label_colors.business_card_label_id')
    //                     ->where([
    //                         ['business_card_label_id','=',$label->id],
    //                         ['name', '=', $request->color]
    //                     ])
    //                     ->get()
    //                     ->pluck('color')->first();

    //                 // $color = $joined->where('business_card_label_id', '=', $label->id)->where('name', '=', $request->color)->get();
    //                 $label->color = $color;

                    

    //                 // return $joined::where('id','=', 1);
                    
                    
                
    //             }
    //             return $card;
    //             // return $card;
    //         }
    //         else {
    //             return $cards;
    //         }
            
    //     }
    //     else {
    //         $cards = BusinessCard::with(['colors', 'price', 'labels'])->get();
    //         return $cards;
    //     }

    // }

    public function design(Request $request) {
        if(!isset($request->id) || !isset($request->color)) {
            return -2;  // echo "Required fields missing.";
        }
        $card = BusinessCard::where('id', '=', $request->id)  
        ->get()->first();
        $colors = BusinessCardColor::where('business_card_id', '=', $card->id)->with('labels')->get();
        $selected_color = null;
        foreach($colors as $color) {
            if($color->name === $request->color) {
                $selected_color = $color;
            }
        }
        if(isset($selected_color)) {
            foreach($selected_color->labels as $label) {
                $label->color = $label->pivot->color;
            }
            $card->labels = $selected_color->labels;
        }
        // return $card->colors;
        return $card;
        // $card_color = BusinessCard::find($id)->with(['colors.labels' => function($query) use ($color, $id) {
        //     $query->where('colors.name','=',$color);
        // }])->get();

    }
}
