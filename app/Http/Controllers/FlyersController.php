<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Flyer\Flyer;
use App\Models\Flyer\FlyerColor;
use App\Models\Flyer\FlyerLabel;
use App\Models\Flyer\FlyerLabelFlyerColor;

use App\Helpers\AppHelper as Helper;

class FlyersController extends Controller
{
    //

    public function index(Request $request) {
        // $designs = Flyer::with('labels.colors', 'colors.labels')->get();

        if(isset($request->shape)) {
            $designs = Flyer::where('shape', $request->shape)->with(['labels_front', 'labels_back'])->get();
        }
        else {
            $designs = Flyer::with(['labels_front', 'labels_back'])->get();
        }
        
        foreach($designs as $design) {
            $colors = FlyerColor::where('flyer_id', $design->id)->get();
            // $colors = $design->colors;
            $primary_colors = array();
            $preview_images = array();
            foreach($colors as $color) {
                array_push($primary_colors, $color->name);
                array_push($preview_images, $color->preview_image);
            }
            $design->colors= $primary_colors;
            $design->preview_images = $preview_images;
            
        }
        
        return $designs;
    }

    public function show(Request $request, $id) {
        
        $flyer = Flyer::find($id);
        if(!$flyer) {
            return -3;  // echo "Flyer not found.";
        }
        // return $flyer->labels;
        return $flyer->with(['labels_front.colors', 'labels_back.colors', 'colors.labels_front', 'colors.labels_back'])->get();
    }

    public function design(Request $request) {
        if(!isset($request->id) || !isset($request->color)) {
            return -2;  // echo "Required fields missing.";
        }
        
        $flyer = Flyer::find($request->id);
        if(!$flyer) {
            return -3;  // echo "Flyer not found.";
        }
        
        $colors = FlyerColor::where('flyer_id', $flyer->id)->get();
        $selected_color = null;
        foreach($colors as $color) {
            if($color->name === $request->color) {
                $selected_color = $color;
            }
        }
        if($selected_color) {
            foreach($selected_color->labels as $label) {
                $label->color = $label->pivot->color;
            }
            $flyer->labels_front = $selected_color->labels_front;
            $flyer->labels_back = $selected_color->labels_back;
            return $flyer;
        }
        else {
            return -4;  // echo "Color for this flyer not found.";
        }  
    }

    public function addFlyer(Request $request) {
        $this->validate($request, [
            'shape' => 'required|string',
            'price_with_cover' => 'required|numeric',
            'price_without_cover' => 'required|numeric',
            'fronttextphoto' => 'nullable|image',
            'frontbasephoto' => 'nullable|image',
            'backtextphoto' => 'nullable|image',
            'backbasephoto' => 'nullable|image'
        ]);

        $flyer = new Flyer; 
        $flyer->shape = $request->shape;
        $flyer->fronttextphoto = $request->fronttextphoto ? Helper::store_data_image($request->fronttextphoto) : null;
        $flyer->frontbasephoto = $request->frontbasephoto ? Helper::store_data_image($request->frontbasephoto) : null;
        $flyer->backtextphoto = $request->backtextphoto ? Helper::store_data_image($request->backtextphoto) : null;
        $flyer->backbasephoto = $request->backbasephoto ? Helper::store_data_image($request->backbasephoto) : null;
        $flyer->price_with_cover = $request->price_with_cover;
        $flyer->price_without_cover = $request->price_without_cover;
            
        if($flyer->save()) {
            return redirect()->back()->with('success', 'Flyer created successfully.');
        }
        return redirect()->back()->with('error', 'Could not create flyer.');
        
    }

    public function deleteFlyers(Request $request) {
        $this->validate($request, [
            'flyers' => 'required|array'
        ]);

        foreach($request->flyers as $flyer_id) {
            if(!Flyer::find($flyer_id)->delete()) {
                return redirect()->back()->with('error', 'Flyer '.$flyer_id.' could not be deleted.');
            }
        }
        return redirect()->back()->with('success', 'Flyers deleted.');
        
        
    }

    public function flyersPage(Request $request) {
        $flyers = Flyer::all();
        return view('admin.flyer.flyers', compact('flyers'));
    }

    public function flyerPage(Request $request, $id) {
        $flyer = Flyer::find($id);
        
        if(!$flyer) {
            return redirect()->back()->with('error', 'Flyer not found.');
        }

        $flyer_colors = Flyer::with('colors.labels')->where('id', $id)->first();
        $flyer_labels = Flyer::with('labels.colors')->where('id', $id)->first();
        $label = new FlyerLabel;
        $label_columns = $label->getTableColumns();
        return view('admin.flyer.flyer', compact('flyer', 'flyer_colors', 'flyer_labels', 'label_columns'));
        
        

        // $card = BusinessCard::with('price')->where('id', $id)->first();
        // $card_colors = BusinessCard::with('colors', 'colors.labels')->where('id', $id)->first();
        // $card_labels = BusinessCard::with('labels', 'labels.colors')->where('id', $id)->first();
        // $label = new BusinessCardLabel;
        // $label_columns = $label->getTableColumns();
        // return view('admin.businesscard.businesscard', compact('card', 'card_colors', 'card_labels', 'label_columns'));
    }

    public function addLabel(Request $request, $id) {
        // foreach($request->colors as $key => $value) {
        //     echo $key." ".$value;
        //     echo BusinessCardColor::find($key);
        // }
        // return $request;

        $flyer = Flyer::find($id);
        if(!$flyer) {
            return redirect()->back()->with('error', 'Invalid Flyer.');
        }
        $request->validate([
            'x1' => 'required|numeric',
            'y1' => 'required|numeric',
            'x2' => 'required|numeric',
            'y2' => 'required|numeric',
            'font_name' => 'required|string',
            'font_weight' => 'required|string',
            'font_size' => 'required|numeric',
            'backside' => 'boolean|required',
            'colors' => 'nullable|array'
        ]);
        $label = new FlyerLabel;
        $label->x1 = $request->x1;
        $label->y1 = $request->y1;
        $label->x2 = $request->x2;
        $label->y2 = $request->y2;
        $label->font_name = $request->font_name;
        $label->font_weight = $request->font_weight;
        $label->font_size = $request->font_size;
        $label->backside = $request->backside;
        if(!$flyer->labels()->save($label)) {
            return redirect()->back()->with('error', 'Label could not be created.');
        }
        if(isset($request->colors)) {
            foreach($request->colors as $key => $value) {
                $color = FlyerColor::find($key);
                if(!$color) {
                    $label->delete();
                    return redirect()->back()->with('error', 'Color '.$color->name.' not found. Label deleted to maintain consistency.');
                }
                $label->colors()->attach($color->id, ['color' => $value]);

                if(!$label->colors()->find($color->id)) {
                    $label->delete();
                    return redirect()->back()->with('error', 'Color '.$color->name.' could not be attached to Label. To maintain consistency, label was deleted.');
                }
            }
        }
        return redirect()->back()->with('success', 'Label created and Colors attached.');
        

    }

    public function deleteLabels(Request $request) {
        $this->validate($request, [
            'labels' => 'required|array'
        ]);
        foreach($request->labels as $label_id) {
            $label = FlyerLabel::find($label_id);
            if(!$label) {
                return redirect()->back()->with('error', 'Label ID '.$label->id.' does not exist.');
            }
            if(!$label->delete()) {
                return redirect()->back()->with('error', 'Label ID '.$label->id.' could not be deleted.');
            }
        }
        return redirect()->back()->with('success', 'Labels successfully deleted.');
    }

    public function addColor(Request $request, $id) {
        // return $request;
        $flyer = Flyer::find($id);
        if(!$flyer) {
            return redirect()->back()->with('error', 'Flyer does not exist.');
        }
        $this->validate($request, [
            'labels' => 'nullable|array',
            'color' => 'required|string',
            'preview_image' => 'nullable|image'
        ]);
        $color = new FlyerColor;
        $color->name = $request->color;
        $color->preview_image = isset($request->preview_image) ? Helper::store_data_image($request->preview_image) : null;
        if(!$flyer->colors()->save($color)) {
            return redirect()->back()->with('error', 'Color could not be created.');
        }
        if(isset($request->labels)) {
            foreach($request->labels as $key => $value) {
                $label = FlyerLabel::find($key);
                if(!$label) {
                    $color->delete();
                    return redirect()->back()->with('error', 'Label not found. Color deleted to restore consistency.');
                }
                $color->labels()->attach($label->id, ['color' => $value]);

                if(!$color->labels()->find($label->id)) {
                    $color->delete();
                    return redirect()->back()->with('error', 'Label could not be attached. Color deleted to maintain consistency.');
                }
            }
        }
        return redirect()->back()->with('success', 'Color created and Labels attached.');
    }

    public function deleteColor(Request $request, $id) {
        $color = FlyerColor::find($id);
        if(!$color) {
            return redirect()->back()->with('error', 'Color not found.');
        }
        if(!$color->delete()) {
            return redirect()->back()->with('error', 'Color could not be deleted.');
        }
        return redirect()->back()->with('success', 'Color deleted successfully.');
    }

    

    
}
