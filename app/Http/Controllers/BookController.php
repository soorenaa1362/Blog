<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends Controller
{
    
    // public function index(){  
    //     $parentBooks = Book::where('parent_id',0)->get();
    //     return view('books', compact('parentBooks'));
    // }


    
    public function index(){  
        $parentBooks = Book::where('parent_id',0)->get();        
        return view('books-table', compact('parentBooks'));
    }
 


    public function accordion()
    {
        $parentBooks = Book::where('parent_id', 0)->get();
        return view('accordion', compact('parentBooks'));
    }



    public function tree()
    {
        $parentBooks = Book::where('parent_id', 0)->get();
        return view('tree.treeMenu', compact('parentBooks'));
    }






    // public function manageBook()
    // {
    //     $categories = Book::where('parent_id', '=', 0)->get();
    //     $allCategories = Book::pluck('title','id')->all();
    //     return view('book.bookTreeview',compact('categories','allCategories'));
    // }


    // public function addBook(Request $request)
    // {
    //     // $this->validate($request, [
    //     // 		'name' => 'required',
    //     // 	]);
    //     $input = $request->all();
    //     $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
        
    //     Book::create($input);
    //     return back()->with('success', 'New Category added successfully.');
    // }




 
}
