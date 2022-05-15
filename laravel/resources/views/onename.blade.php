<h1>onename</h1>
{{$onename->first_name}}
@foreach($onename->work as $work)
    {{$work->link}}
@endforeach
