<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Personal\PersonalItem;
use App\Models\Personal\PersonalSubitem;
use App\Helpers\AppHelper as Helper;

class PersonalItemsController extends Controller
{
    //
    public function index() {
        $items = PersonalItem::with('subitems')->get();
        return $items;
    }

    public function show(Request $request, $id) {
        $item = PersonalItem::find($id);
        
        if(!$item) {
            return -2;  // echo "Item not found.";
        }
        return $item->subitems;

        // return $item ? $item : -2;
    }

    // public function show(Request $request, $id) {
    //     return PersonalItem::find($id) ? PersonalItem::find($id)->subitems : -2;
    // }
    
    public function editItemPage(Request $request, $id) {
        $item = PersonalItem::find($id);
        if(!$item) {
            return redirect()->back()->with('error', 'Item not found.');
        }
        return view('admin.personal.edititem', compact('item'));
    }

    public function editItem(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required|string',
            'name_ar' => 'required|string',
            'image' => 'nullable|image',
            'changeImage' => 'nullable|string'
        ]);
        
        $item = PersonalItem::find($id);
        $item->name = $request->name;
        $item->name_ar = $request->name_ar;
        if($request->changeImage) {
            $old_file = $item->image;
            Helper::delete_data_image($old_file);
            $item->image = Helper::store_data_image($request->image);
        }
        if(!$item->save()) {
            // return redirect('/dashboard/admin/data/personal/item/'.$item->id)->with('error', 'Item could not be updated.');
            return redirect()->back()->with('error', 'Item could not be modified.');
        }
        return redirect()->back()->with('success', 'Item updated.');
    }

    public function subitemPage(Request $request, $id) {
        $subitem = PersonalSubitem::find($id);
        if(!$subitem) {
            return redirect()->back()->with('error', 'Subitem not found.');
        }
        return view('admin.personal.subitem', compact('subitem'));
    }

    
    public function editSubItem(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required|string',
            'name' => 'required|string',
            'image' => 'nullable|image',
            'changeImage' => 'nullable|string'
        ]);
        $subitem = PersonalSubitem::find($id);
        $subitem->name = $request->name;
        $subitem->name_ar = $request->name_ar;
        if($request->changeImage) {
            $old_file = $subitem->image;
            Helper::delete_data_image($old_file);
            $subitem->image = Helper::store_data_image($request->image);
        }
        if($subitem->save()) {
            return redirect()->back()->with('success', 'Subitem modified.');
        }
        return redirect()->back()->with('error', 'Subitem could not be modified.');

       
    }

    public function addPersonalItem(Request $request) {
        $this->validate($request, [
            'name' => 'required|string',
            'name_ar' => 'required|string',
            'image' => 'required|image'
        ]);

        $item = PersonalItem::create([
            'name' => $request->name, 
            'name_ar' => $request->name_ar,
            'image' => Helper::store_data_image($request->image)
        ]);

        if($item) {
            return redirect()->back()->with('success', 'Personal Item created.');
        }
        else {
            return redirect()->back()->with('error', 'Personal Item could not be created.');
        }
    }

    public function deletePersonalItems(Request $request) {
        $this->validate($request, [
            'items' => 'required|array'
        ]);
        foreach($request->items as $item_id) {

            $item = PersonalItem::find($item_id);
            if(!$item) {
                return redirect()->back()->with('error', 'Item ID '.$item->id.' not valid. Item not found.');
            }
            if(!$item->delete()) {
                return redirect()->back()->with('error', 'Item ID '.$item->id.' could not be deleted.');
            }
        }
        return redirect()->back()->with('success', 'Personal Item(s) deleted.');
    }

    public function addPersonalSubitem(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required|string',
            'name_ar' => 'required|string',
            'image' => 'required|image'
        ]);
        $item = PersonalItem::find($id);
        $subitem = new PersonalSubitem;
        $subitem->name = $request->name;
        $subitem->name_ar = $request->name_ar;
        $subitem->image = Helper::store_data_image($request->image);
        $subitem->item()->associate($item);
        if(!$subitem->save()) {
            return redirect()->back()->with('error', 'SubItem could not be created.');
        }
        else {
            return redirect()->back()->with('success', 'SubItem created successfully.');
        }
    }

    public function deletePersonalSubitems(Request $request) {
        $this->validate($request, [
            'subitems' => 'required|array'
        ]);

        
        

        
        foreach($request->subitems as $subitem_id) {
            $subitem = PersonalSubitem::find($subitem_id);
            if(!$subitem) {
                return redirect()->back()->with('error', 'Personal Subitem '.$subitem_id.' not found.');
            }
            if(!$subitem->delete()) {
                return redirect()-> back()->with('error', 'Personal Subitem '.$subitem->id.' could not be deleted.');
            }

        }

        return redirect()->back()->with('success', 'Personal Subitems deleted.');
    }



}

    

    

    

    

    

    







