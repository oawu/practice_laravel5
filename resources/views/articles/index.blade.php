{!! link_to_route('articles.index', '列表') !!}
{!! link_to_route('articles.create', '新增') !!}
<hr />

@if(Session::has('flash_message'))
  {{ Session::get('flash_message') }}
@endif
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>標題</th>
            <th>內容</th>
            <th>細節</th>
            <th>編輯</th>
            <th>刪除</th>
            <th>檢視留言</th>
        </tr>
    </thead>
    <tbody>
        @if ($articles->count ())
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->content }}</td>
                    <td>
                        {!! link_to_route('articles.show', '細節', $article) !!}
                    </td>
                    <td>
                        {!! link_to_route('articles.edit', '編輯', $article) !!}
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['articles.destroy', $article]]) !!}
                            {!! Form::submit('刪除') !!}
                        {!! Form::close() !!}
                    </td>
                    <td>
                        {!! link_to_route('articles.comments.index', '檢視留言', $article) !!}
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan='7'>沒有資料！</td>
            </tr>
        @endif
    </tbody>
</table>