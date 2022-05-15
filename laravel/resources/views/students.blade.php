<h1>STUDENTS</h1>

@foreach($students as $student)
    <h6>{{$student->first_name}}  {{$student->last_name}}</h6>
@endforeach
