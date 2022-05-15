<h1>{{$article->title}}</h1>
<p>{{$article->body}}</p>
@foreach($comments as $comment)
    <li>{{$comment->body}}</li>
@endforeach
