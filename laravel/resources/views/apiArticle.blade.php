<div class="row mt-3 articles"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $.ajax({
        url: "/api/api-articles",
        type: "GET",
        dataType: "json",
        success(data) {
            for (let index in data ) {
                $(`.articles`).append(`
                <h1>${data[index].title}</h1>
                <p>${data[index].content}</p>
                `)
            }
        }
    })

    function storeArticle() {
        const title = $('#title'),
            content = $('#content');
        $.ajax({
                url: "/api/api-articles",
                type: "POST",
                dataType: "json",
                data: {
                    title:title.val(),
                    content:content.val()
                },
            error(err) {
                   const dataEr = err.responseJSON;

                   for(let key in err.responseJSON.error) {
                        let text_error = err.responseJSON.error[key][0];
                        $(`#${key} - error`).removeClass('d-none').text(text_error);

                   }
            },
            success(data) {
                    title.val('');
                    content.val('');

                $(`.articles`).append(`
                <h1>${data.article.title}</h1>
                <p>${data.article.content}</p>
                `)
            }
            }
        )}
</script>

<form action="">
    <div class="mb 3">
        <label for="title" class="form-label">Article Title</label>
        <input type="text" class="form-control" id="title">
        <div class="alert mt - 3 d-none" id="title-error"  role="alert"></div>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Article Content</label>
        <textarea class="Form-control" id="content" rows="3"></textarea>
        <div class="alert mt-6 d-none" id="content-error" role="alert"></div>
    </div>
    <button type="button" onclick="storeArticle()">add</button>
</form>





