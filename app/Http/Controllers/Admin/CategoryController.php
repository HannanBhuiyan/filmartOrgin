<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryItems = Category::latest()->get();
        return view('admin.category.all-category', compact('categoryItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name_bn' => 'required|unique:categories',
            'category_name_en' => 'required|unique:categories',
            'category_icon' => 'required',
        ], [
            'brand_name_bn.required' => 'Enter Bangla Brand Name',
            'brand_name_en.required' => 'Enter English Brand Name',
            'brand_image.required' => 'Imag field is required',
        ]);
        $result = Category::create([
            'category_name_bn' => $request->category_name_bn,
            'category_name_en' => $request->category_name_en,
            'category_slug_bn' => str_replace(' ', '-',  $request->category_name_bn ),
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_icon' =>$request->category_icon,
            'created_at' => Carbon::now(),
        ]);
        if($result){
            return redirect()->back()->with('success', 'Data added success');
        }else {
            return redirect()->back()->with('fail', 'Data not added! Please try again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryDatas = Category::findOrFail($id);
        return view('admin.category.categoryEdit', compact('categoryDatas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name_bn' => 'required',
            'category_name_en' => 'required',
            'category_icon' => 'required',
        ], [
            'brand_name_bn.required' => 'Enter Bangla Brand Name',
            'brand_name_en.required' => 'Enter English Brand Name',
            'brand_image.required' => 'Imag field is required',
        ]);
        $result = Category::findOrFail($id)->update([
            'category_name_bn' => $request->category_name_bn,
            'category_name_en' => $request->category_name_en,
            'category_slug_bn' => str_replace(' ', '-',  $request->category_name_bn ),
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_icon' =>$request->category_icon,
            'created_at' => Carbon::now(),
        ]);
        if($result){
            return redirect()->route('category.index')->with('success', 'Data Update success');
        }else {
            return redirect()->route('category.index')->with('fail', 'Data not Update! Please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Category::findOrFail($id)->forceDelete();
        if($result){
            return redirect()->back()->with('success', 'Data Delete success');
        }else {
            return redirect()->back()->with('fail', 'Data delete failed');
        }
    }
}
