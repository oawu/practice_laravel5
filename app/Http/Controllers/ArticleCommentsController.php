<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use Session;

class ArticleCommentsController extends Controller
{
    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.comments.index', [
                'article' => $article
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.comments.create', [
                'article' => $article
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $this->validate($request, [
            'content' => 'required',
        ]);

        $input = $request->all();
        $article->comments ()->create ($input);

        Session::flash('flash_message', '留言新增成功！');

        return redirect()->route ('articles.comments.index', $article);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($articleId, $commentId)
    {
        $article = Article::findOrFail($articleId);
        $comment = $article->comments ()->findOrFail ($commentId);
        return view('articles.comments.show')
                    ->with('comment', $comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($articleId, $commentId)
    {
        $article = Article::findOrFail($articleId);
        $comment = $article->comments ()->findOrFail ($commentId);
        return view('articles.comments.edit')
                    ->with('article', $article)
                    ->with('comment', $comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $articleId, $commentId)
    {
        $article = Article::findOrFail($articleId);

        $this->validate($request, [
            'content' => 'required'
        ]);

        $input = $request->all();

        $comment = $article->comments ()
                           ->findOrFail ($commentId)
                           ->fill ($input)
                           ->save ();

        Session::flash('flash_message', '儲存成功!');

        return redirect()->route ('articles.comments.index', $article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($articleId, $commentId)
    {
        $article = Article::findOrFail($articleId);

        $article->comments ()
                ->findOrFail ($commentId)
                ->delete();

        Session::flash('flash_message', '刪除成功');

        return redirect()->route ('articles.comments.index', $article);
    }
}
