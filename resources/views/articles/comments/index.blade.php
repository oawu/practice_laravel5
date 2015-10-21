{!! link_to_route('articles.index', '文章列表') !!}
{!! link_to_route('articles.comments.index', '留言列表', $article) !!}
{!! link_to_route('articles.comments.create', '新增留言', $article) !!}
<hr />

@if(Session::has('flash_message'))
    {{ Session::get('flash_message') }}
@endif

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>內容</th>
            <th>細節</th>
            <th>編輯</th>
            <th>刪除</th>
        </tr>
    </thead>
    <tbody>
        @if ($article->comments->count ())
            @foreach ($article->comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->content }}</td>
                    <td>
                        {!! link_to_route('articles.comments.show', '細節', [$article, $comment]) !!}
                    </td>
                    <td>
                        {!! link_to_route('articles.comments.edit', '編輯', [$article, $comment]) !!}
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['articles.comments.destroy', $article, $comment]]) !!}
                            {!! Form::submit('刪除') !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan='5'>沒有資料！</td>
            </tr>
        @endif
    </tbody>
</table>