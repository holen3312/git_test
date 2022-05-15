<form action="/article/update" method="post">
    @csrf
    <div>
        <input type="hidden" name="id" value="{{$article->id}}">
        <h1>Update: {{$article->title}}</h1>
        <label for="title">Title</label>
        <input type="text" name="title" value="{{$article->title}}">
    </div>
    <div>
        <label for="body">Content</label>
        <textarea name="body" id="body" rows="3">{{$article->body}}</textarea>
    </div>
    <button type="submit">Save Changes</button>
</form>
