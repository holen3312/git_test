<div class="row mt-3 products"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $.ajax({
        url: "/api/products",
        type: "GET",
        dataType: "json",
        success(data) {
            for (let index in data ) {
                console.log(data.data);
                $(`.products`).append(`
                <h1>${data[index].title}</h1>
                <p>${data[index].description}</p>
                `)
            }
        }
    })
</script>

