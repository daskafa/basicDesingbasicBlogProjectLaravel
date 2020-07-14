<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


// Models
use App\Models\Category;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(){
      $category = Category::all();
      $articles = Article::all();
      return view('welcome', compact('articles', 'category'));
    }

    public function create(){
      $category = Category::all();
      return view('create', compact('category', 'category'));
    }

    public function createPost(Request $request){
      $category = Category::all();
      $request->validate([
       'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
      ]);
      $article = new Article;
      $article->name = $request->name;
      $article->category_id = $request->categories;
      if ($request->hasFile('image')) {
        $date = date('Y-F-D-G-i-s-');
        $imageName =$date . $request->name . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads'), $imageName);
        $article->image = 'uploads/' . $imageName;
      }
      $article->save();
      return redirect('/');
    }

    public function update(Request $request, $id){
      $article = Article::findOrFail($id);
      return view('update', compact('article'));
    }

    public function updatePost(Request $request, $id){
      $article = Article::findOrFail($id);
      $article->name = $request->name;

      if ($request->hasFile('image')) {
        $date = date('Y-F-D-G-i-s-');
        $imageName =$date . $request->name . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads'), $imageName);
        $article->image = 'uploads/' . $imageName;
      }

      $article->save();
      return redirect('/');
    }

    public function deletePost(Request $request, $id){
      $article = Article::find($id);
      if (File::exists($article->image)) {
        File::delete(public_path($article->image));
      }
      $article->delete();
      return redirect('/');
    }
}
