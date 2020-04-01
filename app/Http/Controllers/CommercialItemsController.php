<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commercial\CommercialItem;

use App\Models\CommercialDesign\CommercialDesign;
use App\Models\CommercialDesign\CommercialDesignLabel;
use App\Models\CommercialDesign\CommercialDesignColor; 
use App\Models\CommercialDesign\CommercialDesignColorLabel;

use App\Helpers\AppHelper as Helper;

class CommercialItemsController extends Controller
{
    //

    public function index() {
        $items = CommercialItem::all();
        return $items;
    }

    public function itemsPage() {
        $items = CommercialItem::all();
        return view('admin.commercial.items', compact('items'));
    }

    public function itemPage(Request $request, $id) {
        $item = CommercialItem::find($id);
        if(!$item) {
            return redirect()->back()->with('error', 'Item not found.');
        }
        $designs = CommercialDesign::where('commercial_item_id', $id)->get();
        return view('admin.commercial.item', compact('item', 'designs'));
    }

    public function editItemPage(Request $request, $id) {
        $item = CommercialItem::find($id);
        if(!$item) {
            return redirect()->back()->with('error', 'Item not found.');
        }
        return view('admin.commercial.edititem', compact('item'));
    }

    public function editItem(Request $request, $id) {
        $item = CommercialItem::find($id);
        $this->validate($request, [
            'name' => 'required|string',
            'name_ar' => 'required|string',
            'image' => 'nullable|image',
            'changeImage' => 'nullable|string',
            'price' => 'nullable|float'
        ]);
        $item->name = $request->name;
        $item->name_ar = $request->name_ar;
        $item->image = isset($request->changeImage) ? Helper::replace_data_image($request->image, $item->image) : $item->image;
        $item->price = isset($request->price) ? $request->price : $item->price;
        if($item->save()) {
            // return redirect('/dashboard/admin/data/commercial/item/'.$item->id)->with('success', 'Item modified.');
            return redirect()->back()->with('success', 'Item modified.');
        }
        return redirect()->back()->with('error', 'Item could not be modified.');
    }

    public function addItem(Request $request) {
        $this->validate($request, [
            'name' => 'required|string',
            'name_ar' => 'required|string',
            'image' => 'required|image',
            'price' => 'nullable|numeric'
        ]);
        $item = new CommercialItem;
        $item->name = $request->name;
        $item->name_ar = $request->name_ar;
        $item->image = Helper::store_data_image($request->image);
        $item->price = $request->price;
        if(!$item->save()) {
            return redirect()->back()->with('error', 'Item could not be created.');
        }
        return redirect()->back()->with('success', 'Item created successfully.');
    }

    public function deleteItems(Request $request) {
        $this->validate($request, [
            'items' => 'required|array'
        ]);
        $items = $request->items;
        foreach($items as $item_id) {
            $item = CommercialItem::find($item_id);
            if(!$item) {
                return redirect()->back()->with('error', 'Item '.$item_id.' does not exist.');
            }
            if(!$item->delete()) {
                return redirect()->back()->with('error', 'Item '.$item_id.' could not be deleted.');
            }
            
        }
        return redirect()->back()->with('success', 'Items deleted.');
    }

    public function addDesign(Request $request, $category_id) {

        $this->validate($request, [
            'shape' => 'required|string',
            'orientation' => 'required|string',
            'fold' => 'nullable|string',
            'type' => 'nullable|string',
            'price_with_cover' => 'required|numeric',
            'price_without_cover' => 'required|numeric',
            'fronttextphoto' => 'nullable|image',
            'frontbasephoto' => 'required|image',
            'backtextphoto' => 'nullable|image',
            'backbasephoto' => 'nullable|image',
            'design_name' => 'required|string'
        ]);

        $item = CommercialItem::find($category_id);
        if(!$item) {
            return redirect()->back()->with('error', 'Commercial Item not found.');
        }
        
        $design = new CommercialDesign; 
        $design->design_name = $request->design_name;
        $design->shape = $request->shape;
        $design->orientation = $request->orientation;
        $design->fold = $request->fold;
        $design->type = $request->type;
        $design->fronttextphoto = $request->fronttextphoto ? Helper::store_data_image($request->fronttextphoto) : null;
        $design->frontbasephoto = $request->frontbasephoto ? Helper::store_data_image($request->frontbasephoto) : null;
        $design->backtextphoto = $request->backtextphoto ? Helper::store_data_image($request->backtextphoto) : null;
        $design->backbasephoto = $request->backbasephoto ? Helper::store_data_image($request->backbasephoto) : null;
        $design->price_with_cover = $request->price_with_cover;
        $design->price_without_cover = $request->price_without_cover;
        
        if($item->designs()->save($design)) {
            return redirect()->back()->with('success', 'Design created successfully.');
        }
        return redirect()->back()->with('error', 'Could not create design.');
        
    }

    public function deleteDesigns(Request $request) {
        $this->validate($request, [
            'designs' => 'required|array'
        ]);

        foreach($request->designs as $design_id) {
            if(!CommercialDesign::find($design_id)->delete()) {
                return redirect()->back()->with('error', 'Design '.$design_id.' could not be deleted.');
            }
        }
        return redirect()->back()->with('success', 'Designs deleted.');
        
        
    }

    public function designPage(Request $request, $id) {
        $design = CommercialDesign::find($id);
        if(!$design) {
            return redirect()->back()->with('error', 'Design not found.');
        }
        // return $design;
        // return $design->item;
        
        $design_colors = CommercialDesign::with('colors.labels')->where('id', $id)->first();
        $design_labels = CommercialDesign::with('labels.colors')->where('id', $id)->first();
        $label = new CommercialDesignLabel;
        $label_columns = $label->getTableColumns();
        $options_info = $design->item->options_info;
        
        return view('admin.commercial.design', compact('design', 'design_colors', 'design_labels', 'label_columns', 'options_info'));
    }

    public function createLabelPage(Request $request, $id) {
        $design = CommercialDesign::find($id);
        if(!$design) {
            return redirect()->back()->with('error', 'Invalid Design.');
        }
        $design_labels = CommercialDesign::with('labels.colors')->where('id', $id)->first();
        $label = new CommercialDesignLabel;
        $label_columns = $label->getTableColumns();
        return view('admin.commercial.addlabel', compact('design', 'design_labels', 'label_columns'));
    }

    public function addLabel(Request $request, $id) {
        $design = CommercialDesign::find($id);
        if(!$design) {
            return redirect()->back()->with('error', 'Invalid Design.');
        }
        $request->validate([
            'x1' => 'required|numeric',
            'y1' => 'required|numeric',
            'x2' => 'required|numeric',
            'y2' => 'required|numeric',
            'font_name' => 'required|string',
            'font_weight' => 'required|numeric',
            'font_style' => 'required|numeric',
            'font_size' => 'required|numeric',
            'backside' => 'required|boolean',
            'text' => 'required|string',
            'text_decoration' => 'required|string',
            'colors' => 'nullable|array',
            'image' => 'nullable|image',
            'hint' => 'nullable|string'
        ]);
        $label = new CommercialDesignLabel;
        $label->x1 = $request->x1;
        $label->y1 = $request->y1;
        $label->x2 = $request->x2;
        $label->y2 = $request->y2;
        $label->font_name = $request->font_name;
        $label->font_weight = $request->font_weight;
        $label->font_style = $request->font_style;
        $label->font_size = $request->font_size;
        $label->text = $request->text;
        $label->text_decoration = $request->text_decoration;
        $label->backside = $request->backside;
        $label->hint = $request->hint;
        if(isset($request->image)) {
            $label->image = Helper::store_data_image($request->image);
            $label->is_image = true;
        }
        if(!$design->labels()->save($label)) {
            return redirect()->back()->with('error', 'Label could not be created.');
        }
        if(isset($request->colors)) {
            foreach($request->colors as $key => $value) {
                $color = CommercialDesignColor::find($key);
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
            $label = CommercialDesignLabel::find($label_id);
            if(!$label) {
                return redirect()->back()->with('error', 'Label ID '.$label->id.' does not exist.');
            }
            Helper::delete_data_image($label->image);
            if(!$label->delete()) {
                return redirect()->back()->with('error', 'Label ID '.$label->id.' could not be deleted.');
            }
        }
        return redirect()->back()->with('success', 'Labels successfully deleted.');
    }

    public function addColor(Request $request, $id) {
        // return $request;
        $design = CommercialDesign::find($id);
        if(!$design) {
            return redirect()->back()->with('error', 'Flyer does not exist.');
        }
        $this->validate($request, [
            'labels' => 'nullable|array',
            'color' => 'required|string',
            'preview_image' => 'nullable|image'
        ]);
        $color = new CommercialDesignColor;
        $color->name = $request->color;
        $color->preview_image = isset($request->preview_image) ? Helper::store_data_image($request->preview_image) : null;
        if(!$design->colors()->save($color)) {
            return redirect()->back()->with('error', 'Color could not be created.');
        }
        if(isset($request->labels)) {
            foreach($request->labels as $key => $value) {
                $label = CommercialDesignLabel::find($key);
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
        $color = CommercialDesignColor::find($id);
        if(!$color) {
            return redirect()->back()->with('error', 'Color not found.');
        }
        if(!$color->delete()) {
            return redirect()->back()->with('error', 'Color could not be deleted.');
        }
        return redirect()->back()->with('success', 'Color deleted successfully.');
    }

    public function designs(Request $request, $id) {
        
        $item = CommercialItem::find($id);
        if(!$item) {
            return -3;  // echo "Item not found.";
        }

        // if(isset($request->shape) && isset($request->orientation)) {
        //     $designs = $item->designs->where('shape', $request->shape)->where('orientation', $request->orientation)->values();
        // }
        // else if(isset($request->shape)) {
        //     $designs = $item->designs->where('shape', $request->shape)->values();
        //     return $designs;
        // }
        // else if(isset($request->orientation)) {
        //     $designs = $item->designs->where('orientation', $request->orientation)->values();
        // }
        // else {
        //     $designs = $item->designs;
        // }

        // return optional($request->fold);

        // $designs = $item->designs->where(
        //     [
        //         'shape' => $request->shape,
        //         'orientation' => $request->orientation,
        //         'fold' => $request->fold,
        //         'type' => $request->type
        //     ]
        // )->values();
        
        $all_designs = $item->designs;
        $designs = array();
        foreach($all_designs as $design) {
            $flag = true;
            if(isset($request->shape)) {
                if(strtolower($design->shape) !== strtolower($request->shape)) {
                    $flag = false;
                }
            }
            if(isset($request->orientation)) {
                if(strtolower($design->orientation) !== strtolower($request->orientation)) {
                    $flag = false;
                }
            }
            if(isset($request->fold)) {
                if(strtolower($design->fold) !== strtolower($request->fold)) {
                    $flag = false;
                }
            }
            if(isset($request->type)) {
                if(strtolower($design->type) !== strtolower($request->type)) {
                    $flag = false;
                }
            }
            if($flag) {
                array_push($designs, $design);
            }

        }
        
       
        foreach($designs as $design) {
           
            $colors = array();
            $preview_images = array();
            $design->price_with_cover = $design->price_with_cover;
            foreach($design->colors as $color) {
                array_push($colors, $color->name);
                array_push($preview_images, $color->preview_image);
            }
            unset($design->colors);
            $design->colors = $colors;
            $design->colors_preview = $preview_images;

        }
        return $designs;
    }

    public function design(Request $request) {
        if(!isset($request->id) || !isset($request->color)) {
            return -2;
        }
        $design = CommercialDesign::find($request->id);
        if(!$design) {
            return -3;  // echo "Design not found.";
        }
        $selected_color = null;
        foreach($design->colors as $color) {
            if($color->name === $request->color) {
                $selected_color = $color;
            }
        }

        if($selected_color) {
            unset($design->colors);
            $design->labels_back = $selected_color->labels_back;
            $design->labels_front = $selected_color->labels_front;
            foreach($design->labels_back as $label) {
                $label->color = $label->pivot->color;
                unset($label->pivot);
            }
            foreach($design->labels_front as $label) {
                $label->color = $label->pivot->color;
                unset($label->pivot);
            }
            return $design;
        }
        else {
            return -4;  // echo "Color not found.";
        }

        
    }

    public function labelPage(Request $request, $id) {
        $label = CommercialDesignLabel::find($id);
        $label->colors = $label->colors;
        if(!$label) {
            return redirect()->back()->with('error', 'Label not found.');
        }
        return view('admin.commercial.label', compact('label'));
    }

    public function editLabel(Request $request, $id) {
    
        $label = CommercialDesignLabel::find($id);
        if(!$label) {
            return redirect()->back()->with('error', 'Label not found.');
        }
        $this->validate($request, [
            'x1' => 'required|numeric',
            'y1' => 'required|numeric',
            'x2' => 'required|numeric',
            'y2' => 'required|numeric',
            'font_name' => 'required|string',
            'font_weight' => 'required|numeric',
            'font_style' => 'required|numeric',
            'font_size' => 'required|string',
            'backside' => 'required|boolean',
            'text' => 'required|string',
            'text_decoration' => 'required|string',
            'changeImage' => 'nullable|string',
            'image' => 'nullable|image',
            'colors' => 'nullable|array',
            'hint' => 'nullable|string'
        ]);
        $label->x1 = $request->x1;
        $label->y1 = $request->y1;
        $label->x2 = $request->x2;
        $label->y2 = $request->y2;
        $label->font_name = $request->font_name; 
        $label->font_weight = $request->font_weight;
        $label->font_size = $request->font_size;
        $label->font_style = $request->font_style; 
        $label->backside = $request->backside;
        $label->text = $request->text;
        $label->text_decoration = $request->text_decoration;
        if(isset($request->hint)) {
            $label->hint = $request->hint;
        }
        if(isset($request->changeImage)) {
            if(!$request->image) {
                $label->is_image = false;
            }
            else {
                $label->image = Helper::replace_data_image($request->image, $label->image);
                $label->is_image = true;
            }
            
        }

        if(isset($request->colors)) {  
            foreach($request->colors as $key => $value) {
                $label->colors()->updateExistingPivot($key, ['color' => $value]);
            }
        }
        if($label->save()) {
            return redirect()->back()->with('success', 'Label updated.');
        } 
        else {
            return redirect()->back()->with('error', 'Label could not be updated.');
        }

        
        
    }


    public function colorPage(Request $request, $id) {
         $color = CommercialDesignColor::find($id);
        if(!$color) {
            return redirect()->back()->with('error', 'Color not found.');
        }
        return view('admin.commercial.color', compact('color'));
        
    }

    public function editColor(Request $request, $id) {
        $color = CommercialDesignColor::find($id);
        if(!$color) {
            return redirect()->back()->with('error', 'Color not found.');
        }
        $this->validate($request, [
            'name' => 'required|string',
            'image' => 'nullable|image',
            'changeImage' => 'nullable|string',
            'labels' => 'nullable|array'
        ]);
        $color->name = $request->name;
        if($request->changeImage) {
            $color->preview_image = Helper::replace_data_image($request->image, $color->preview_image);
        }
        if(isset($request->labels)) {
            foreach($request->labels as $key => $value) {
                $color->labels()->updateExistingPivot($key, ['color' => $value]);
            }
        }
        if($color->save()) {
            return redirect()->back()->with('success', 'Color updated.');
        }
        else {
            return redirect()->back()->with('error', 'Color could not be updated.');
        }
    }

    public function editDesignPage(Request $request, $id) {
        $design = CommercialDesign::find($id);
        if(!$design) {
            return redirect()->back()->with('error', 'Design '.$id.' not found.');
        }
        $options_info = $design->item->options_info;
        return view('admin.commercial.editdesign', compact('design', 'options_info'));
    }

    public function editDesign(Request $request, $id) {
        $design = CommercialDesign::find($id);
        if(!$design) {
            return redirect()->back()->with('error', 'Design not found');
        }
        $this->validate($request, [
            'shape' => 'required|string',
            'design_name' => 'required|string',
            'orientation' => 'required|string',
            'fold' => 'nullable|string',
            'type' => 'nullable|string',
            'changeFrontTextPhoto' => 'nullable|string',
            'fronttextphoto' => 'nullable|image',
            'changeFrontBasePhoto' => 'nullable|string',
            'frontbasephoto' => 'nullable|image',
            'changeBackBasePhoto' => 'nullable|string',
            'backbasephoto' => 'nullable|image',
            'changeBackTextPhoto' => 'nullable|string',
            'backtextphoto' => 'nullable|image',
            'price_with_cover' => 'required|numeric',
            'price_without_cover' => 'required|numeric'
            // 'item_id' => 'required|integer'
        ]);
        // $item = CommercialItem::find($request->item_id);
        // if(!$item) {
        //     return redirect()->back()->with('error', 'Invalid Item ID.');
        // }
        $design->shape = $request->shape;
        $design->design_name = $request->design_name;
        $design->orientation = $request->orientation;
        $design->fold = $request->fold ? $request->fold : $design->fold;
        $design->type = $request->type ? $request->type : $design->type;
        if($request->changeFrontBasePhoto) {
            if(!$request->frontbasephoto) {
                return redirect()->back()->with('error', 'Front base photo is required.');
            }
            $design->frontbasephoto = Helper::replace_data_image($request->frontbasephoto, $design->frontbasephoto);
        }
        if($request->changeFrontTextPhoto) {
            $design->fronttextphoto = $request->fronttextphoto ? Helper::replace_data_image($request->fronttextphoto, $design->fronttextphoto) : null;
        }
        if($request->changeBackBasePhoto) {
            $design->backbasephoto = $request->backbasephoto ? Helper::replace_data_image($request->backbasephoto, $design->backbasephoto) : null;
        }
        if($request->changeBackTextPhoto) {
            $design->backTextPhoto = $request->backtextphoto ? Helper::replace_data_image($request->backtextphoto, $design->backtextphoto) : null;
        }

        
        $design->price_with_cover = $request->price_with_cover;
        $design->price_without_cover = $request->price_without_cover;
        // $design->commercial_item_id = $request->item_id;
        if($design->save()) {
            return redirect()->back()->with('success', 'Design updated.');
        }
        else {
            return redirect()->back()->with('error', "Design could not be updated.");
        }
    }  
    
    public function getAllItemOptions() {
        $item_with_options = CommercialItem::get(['id', 'name', 'options_info']);
        return $item_with_options;
    }

    public function getItemOptions(Request $request, $id) {
        $item = CommercialItem::find($id);
        if(!$item) {
            return -3;  // echo "Item not found.";
        }
        return $item->options_info;
    }

    

    
}
