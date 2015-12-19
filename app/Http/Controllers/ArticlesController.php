<?php

namespace App\Http\Controllers;

use App\articles;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Illuminate\HttpRespones;
use Auth;
use app\Http\Middleware\Authenticate;


class ArticlesController extends Controller
{
    
   public function __construct() {
        $this->middleware('auth',['except'=>'index']);
  }
   
    
    /**
     * Show all articles
     * 
     * @return Response
     */
    public function index(){
         
// $articles = articles::latest('published_at')->get();//this will order the articles in descending order
        
 // return \Auth::user();

        $articles = articles::latest('published_at')->published()->get();
//this will order the articles in descending order
      
             
        
        return view('articles.index',compact('articles'));
    }
    /**
     * 
     * @param type Article $articles
     * @return type
     */
    public function show(articles $articles){
        return view('articles.show',compact('articles'));        
    }
    public function create(){

        
        return view('articles.create');
        
    }
    public function store(ArticleRequest $request){
     
        $article = new articles($request->all());
     Auth::user()->articles()->save($article);

     return redirect('articles');
     
     
//        
//    $input = Request::get('body');
//return $input;    
        
    }
    
    public function edit($id){
        
        $article = articles::findOrFail($id);
        return view('articles.edit',compact('article'));
        
        
        
    }
    
    public function update($id, ArticleRequest $request)
            {
         
         $article = articles::findOrFail($id);
         
              $article->update($request->all());
     return redirect('articles');
         
         
        
        
    }
}
