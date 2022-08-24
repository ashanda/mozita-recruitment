<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;


class UserCategoryController extends Controller
{
    public function index(Request $request)
    {
        $role = Auth::user()->type;
       
        
        if($role == 'employee'){
            $categories = Category::all();
            return view('partials.employee.employee.categories.index')->with(compact(['categories']));
        }        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $role = Auth::user()->type;
       

        if($role == 'employee'){
            $categories = Category::all();
            return view('partials.employee.employee.categories.create')->with(compact(['categories']));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->parent_id = $request->parent_category ? $request->parent_category : 0;

        if ($category->save() ) {
            
            Alert::success('Success', 'Job category created successfully');
            return redirect()->route('categories.index');
        }
        Alert::warning('Fail', 'Job category created faild');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        
        $role = Auth::user()->type;

            return view('partials.employee.employee.categories.edit')->with(compact(['category', 'categories']));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->name = $request->name;
        $category->parent_id = $request->parent_category ? $request->parent_category : 0;

        if ($category->save() ) {
            Alert::success('Success', 'Job category update successfully');
            return redirect()->route('categories.index');   
        }
        Alert::warning('Fail', 'Job category updated faild');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->delete()) {
            Alert::success('Success', 'Job category delete successfully');
            return redirect()->back()->with(['success' => 'Category successfully deleted.']);

        }
        Alert::warning('Fail', 'Job category delete faild');
        return redirect()->back()->with(['fail' => 'Unable to delete category.']);
    }
}
