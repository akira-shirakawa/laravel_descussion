<?php

namespace App\Http\Controllers;
use app\User;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use auth;
use Log;
use Illuminate\Support\Facades\DB;
use App\Comment;
use Carbon\Carbon;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Carbon::setLocale('ja');
        $article = Article::latest()->simplePaginate(5);
        $article_famous = Article::withCount('votes')->orderBy('votes_count', 'desc')->simplePaginate(5);
        return view('index',[ 'articles' => $article , 'articles_famous' => $article_famous]);
    }
    public function category($id)
    {
        Carbon::setLocale('ja');
        $article = Article::where('category',$id)->latest()->simplePaginate(5);
        $article_famous = Article::withCount('votes')->orderBy('votes_count', 'desc')->simplePaginate(5);
        $name = Article::convert_category($id);
        return view('category',[ 'articles' => $article , 'articles_famous' => $article_famous,'name' => $name]);
    }

    public function user(User $user){
        Carbon::setLocale('ja');
        $article = Article::where('user_id',$user->id)->latest()->simplePaginate(5);
        
        return view('user',[ 'articles' => $article ,'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_article');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request,Article $article)
    {
        
        $article->fill($request->all());
        $article->user_id = Auth::id();
        $article->save();
        return redirect('/');       
    }

   

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        Carbon::setLocale('ja');
        $comment = Comment::where('article_id', $article->id)->withCount('users')->orderBy('users_count','desc')->simplePaginate(5);
        $category_id = $article->category;
        $category_ranking = Article::where('category',$category_id)->withCount('votes')->orderBy('votes_count', 'desc')->paginate(5);
        return view('show_article', ['article' => $article, 'comments' => $comment, 'category_ranking' => $category_ranking]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {       
            return view('edit_article', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article_id = $article->id;
        $article->delete();
        return back();
    }

    public function vote(Request $request)
    {
        
        $article = Article::find($request->article_id);        
        $article->votes()->attach($request->user_id, ['vote'=> $request->vote, 'user_attribute'=>$request->user_attribute]);
        return;
    }
    public function getVote($id)
    {
        $user1 = DB::table('article_user')               
                ->where('article_id', $id)                
                ->count();
        $user2 = DB::table('article_user')               
                ->where('article_id', $id)
                ->whereIn('user_attribute', [1, 3, 5])
                ->count();
        $user3 = DB::table('article_user')               
                ->where('article_id', $id)
                ->whereIn('user_attribute', [2, 4, 6])
                ->count();
        $user4 = DB::table('article_user')               
                ->where('article_id', $id)
                ->whereIn('user_attribute', [1, 2])
                ->count();
        $user5 = DB::table('article_user')               
                ->where('article_id', $id)
                ->whereIn('user_attribute', [3, 4])
                ->count();
        $user6 = DB::table('article_user')               
                ->where('article_id', $id)
                ->whereIn('user_attribute', [5, 6])
                ->count();
        $amount = [$user1,$user2,$user3,$user4,$user5,$user6];

        $user1_for = DB::table('article_user')               
        ->where('article_id', $id)
        ->where('vote', 1)        
        ->count();
        $user2_for = DB::table('article_user')               
        ->where('article_id', $id)
        ->whereIn('user_attribute', [1, 3, 5])
        ->where('vote', 1)
        ->count();
        $user3_for = DB::table('article_user')               
        ->where('article_id', $id)
        ->whereIn('user_attribute', [2, 4, 6])
        ->where('vote', 1)
        ->count();
        $user4_for = DB::table('article_user')               
        ->where('article_id', $id)
        ->whereIn('user_attribute', [1, 2])
        ->where('vote', 1)
        ->count();
        $user5_for = DB::table('article_user')               
        ->where('article_id', $id)
        ->whereIn('user_attribute', [3, 4])
        ->where('vote', 1)
        ->count();
        $user6_for = DB::table('article_user')               
        ->where('article_id', $id)
        ->whereIn('user_attribute', [5, 6])
        ->where('vote', 1)
        ->count();
        $amount_for = [$user1_for,$user2_for,$user3_for,$user4_for,$user5_for,$user6_for];
        
        $label = [];
        $label_css = [];
        $result = [$amount,$amount_for];
        Log::debug($result);
        
        return $result;
        
            
    }

    public function hasMyVote($id)
    {
        $article = Article::find($id);
        
        $result = $article->votes()->where('user_id', Auth::id())->count();
        return $result;
        
    }
}
