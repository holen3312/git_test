<h1>blog</h1>
<meta name = "csrf" content="{{csrf_token()}}">
<form action="/article" method="post">
    @csrf
    <div>
        <label for="title">Title</label>
    <input type="text" name="title">
    </div>
    <div>
        <label for="body">Content</label>
        <textarea name="body" id="body" rows="3"></textarea>
    </div>
    <button type="submit" onclick="event.preventDefault(); addArticle()">Submit</button>
</form>
<div>

    <script>
        function addArticle() {
            const title = document.querySelector('input[name = "title"]').value;
            const body = document.querySelector('textarea[name = "body"]').value;

            let formData = new FormData();
            formData.append('title', title);
            formData.append('body', body);

            fetch('/article', {
                method: "POST",
                body: formData
            })
        }
    </script>

    @foreach($articles as $article)
        <a href="/article/{{$article->id}}">
            <ol>{{$article->title}}</ol>
        </a>

        <li>{{$article->body}}</li>

        <a href="/article/{{$article->id}}/update">Update</a>

        <form action="/article/delete" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $article->id }}">
        <button type="submit" style="width: 100px">DELETE</button>
        </form>


    @endforeach
</div>
