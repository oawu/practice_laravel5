<article>
    <h1>{{ $article->title }}</h1>
    <hr/>
    <section>
        {{ $article->content }}
        <hr/>
        <div>更新時間：{{ $article->updated_at }}</div>
        <div>新增時間：{{ $article->created_at }}</div>
    </section>
</article>
<hr/>
{!! link_to_route('articles.index', '列表') !!}
