<h1>TODOS</h1>

@foreach($todos as $todo)
    <li>{{$todo['title']}}</li>

    @if($todo->status === 1)
        <span>ok</span>

    @else
        <span>so so</span>
    @endif

    <ul>{{$todo->note}}</ul>
@endforeach

