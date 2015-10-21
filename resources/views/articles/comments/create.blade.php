@if($errors->any())
    <ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
@endif

{!! Form::model(null, ['route' => ['articles.comments.store', $article]]); !!}
    {!! Form::label('content', '內容'); !!}
    {!! Form::textarea('content', null, ['placeholder="請輸入內容.."']); !!}
    <hr/>
    {!! Form::submit('送出'); !!}
{!! Form::close(); !!}