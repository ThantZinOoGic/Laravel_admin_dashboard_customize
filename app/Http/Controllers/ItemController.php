<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Category;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $items = Item::orderBy('items.category_id')->paginate(5);
        // return $items;
        return view('item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('item.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        // return $request;
        $item = new Item();
        $item->category_id = $request->category_id ;
        $item->name = $request->name ;
        $item->price = $request->price ;
        $item->expire_date = $request->expire_date ;
        // return $item;
        $item->save();
        return redirect()->route('items.index')->with('create', 'Create is success!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        $item = Item::findOrFail($item->id);
        return view('item.detail', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $item = Item::findOrFail($item->id);
        $categories = Category::all();
        return view('item.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $item = Item::findOrFail($item->id);
        $item->category_id = $request->category_id ;
        $item->name = $request->name ;
        $item->price = $request->price ;
        $item->expire_date = $request->expire_date ;
        $item->update();
        return redirect()->route('items.index')->with('update', 'Update is success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item = Item::findOrFail($item->id);
        if($item)
        {
            $item->delete();
        }
        return redirect()->back()->with('delete', 'Delete is success!');
    }
}
