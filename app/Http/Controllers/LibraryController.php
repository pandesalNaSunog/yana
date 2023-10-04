<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LibraryCategory;
use App\Models\LibrarySolution;
class LibraryController extends Controller
{
    public function clientLibrary(){
        $categories = LibraryCategory::all();

        $data = [];

        foreach($categories as $category){
            $solutions = LibrarySolution::where('category_id', $category->id)->get();
            $data[] = [
                'category' => $category->category,
                'solutions' => $solutions,
                'accordion_id' => $category->id
            ];
        }
        return view('library',[
            'data' => $data
        ]);
    }
    public function library(){
        $libraryCategories = LibraryCategory::latest()->paginate(3);
        $data = [
            'libraryCategories' => $libraryCategories,
            'active' => 'library'
        ];
        return view('admin.library',$data);
    }

    public function addCategory(Request $request){
        $fields = $request->validate([
            'category' => 'required|min:5'
        ]);

        LibraryCategory::create($fields);
        return redirect('/admin/library')->with('message', 'A library category has been successfully added.');
    }
    public function editCategory(LibraryCategory $category){
        return view('admin.edit-category',[
            'category' => $category,
            'active' => 'none'
        ]);
    }
    public function updateCategory(LibraryCategory $category, Request $request){
        $fields = $request->validate([
            'category' => 'required|min:5'
        ]);

        $category->update([
            'category' => $fields['category']
        ]);

        return redirect('/admin/edit-category/' . $category->id)->with('message', 'Category has been successfully updated.');
    }
    public function deleteCategory(LibraryCategory $category){
        $categoryId = $category->id;
        $solutions = LibrarySolution::where('category_id', $categoryId)->delete();
        $category->delete();
        return back()->with('message', 'Category has been deleted.');    
    }
    public function solutions(LibraryCategory $category){
        $solutions = LibrarySolution::where('category_id', $category->id)->latest()->paginate(3);
        return view('admin.solutions',[
            'solutions' => $solutions,
            'category' => $category,
            'active' => 'none'
        ]);
    }
    public function addSolution(Request $request){
        $fields = $request->validate([
            'category_id' => 'required',
            'solution' => 'required'
        ]);

        LibrarySolution::create($fields);
        return redirect('/admin/solutions/' . $fields['category_id'])->with('message', 'Solution has been successfully added.');
    }
    public function editSolution(LibrarySolution $solution){
        $category = LibraryCategory::where('id', $solution->category_id)->first();
        if($category){
            return view('admin.edit-solution',[
                'solution' => $solution,
                'category' => $category,
                'active' => 'none'
            ]);
        }
        
    }
    public function updateSolution(Request $request, LibrarySolution $solution){
        $fields = $request->validate([
            'solution' => 'required'
        ]);

        $solution->update($fields);

        return back()->with('message', 'Solution has been updated successfully.');
    }
}
