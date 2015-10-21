@if($errors->any())
    <ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
@endif

{!! Form::model($article, array('method' => 'PUT', 'route' => ['articles.update', $article])) !!}
    {!! Form::label('title', '標題'); !!}
    {!! Form::text('title', null, ['placeholder="請輸入名稱.."']); !!}
    <br/>
    {!! Form::label('content', '內容'); !!}
    {!! Form::textarea('content', null, ['placeholder="請輸入內容.."']); !!}
    <hr/>
    {!! Form::submit('送出'); !!}
{!! Form::close(); !!}