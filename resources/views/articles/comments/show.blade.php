<article>
    <h1>{{ $comment->article->title }}</h1>
    <hr/>
    <section>
        {{ $comment->content }}
        <hr/>
        <div>更新時間：{{ $comment->updated_at }}</div>
        <div>新增時間：{{ $comment->created_at }}</div>
    </section>
</article>
<hr/>
{!! link_to_route('articles.comments.index', '列表', $comment->article) !!}
