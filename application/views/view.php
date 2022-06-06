
<title>Shopping list</title>
<h3>Shopping list</h3>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


<div>
    <form action="/pages/create" method="POST">
        <label for="title" class="form-label">Name</label>
        <input type="text" class="form-control" name="title" /><br />
        
        <select class="form-select mb-2" aria-label="Default select example" name="category_id">
            <?php foreach ($categories as $category):?>
                <option value="<?= $category['id']; ?>"><?=$category['name'];?></option>
                <?php endforeach;?>
                
            </select>
            <button type="submit" onclick="addNote()" class="btn btn-success">Add note</button>
    </form>
</div>

<div class="card">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
      <?php foreach ($list as $elem) : ?>
    <h5 class="card-title">Title: <?= $elem['title']; ?></h5>
    <p class="card-status">Status: <?= $elem['status']; ?></p>
    <p class="card-date-added">Date added: <?= $elem['date_added']; ?></p>
    <p class="card-name">Category: <?= $elem['name']; ?></p>
    <button type="submit" onclick="showUpdateForm('<?=$elem['title']?>', '<?= $elem['category_id'];?>', '<?= $elem['id'];?>')" class="btn btn-primary">Update note</button>
    <button type="submit" class="btn btn-danger">Delete note</button>
    <?php endforeach ;?>
  </div>
</div>


<div class="update-form d-none" >
    <form action="" id="update" method="POST">
        <input type="hidden" id="id-update">
        <label for="title-update" class="form-label">Name</label>
        <input type="text" class="form-control" id="title-update" /><br />
        
        <select class="form-select mb-2" aria-label="Default select example" id="category_id-update">
            <?php foreach ($categories as $category):?>
                <option value="<?= $category['id']; ?>"><?=$category['name'];?></option>
                <?php endforeach;?>
                
            </select>
            <button type="submit"  class="btn btn-primary">Update note</button>    </form>
    </div>



<div class="row mt-3 list"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
function addNote() {
    const title = document.querySelector('input[name = "title"]').value;
    const category = document.querySelector('select[name = "category_id"]').value;

    let formData = new FormData();
    formData.append('title', title);
    formData.append('category_id', category);
    console.log(formData);
    
    fetch('pages/create', {
                method: "POST",
                mode:'no-cors',
                body: formData
    })

    location.reload();
}

function updateNote() {
    const title = $('#title-update').val();
    category = $('#category_id-update').val();
    id = $('#id-update').val();
    console.log(id);
   


    $.ajax({
        url: "update/" + id,
        type: "POST",
        dataType: "json",
        data: {
            title:title.val(),
            category:category.val()
        },

        success(data) {
            title.val(''),
            category.val('');

            $(`.list`).append(`
            <h4>$(data.updateNote.title)</h4>
            <p>$(data.updateNope.category)</p>
            `)
        }
    })   

}

function showUpdateForm(title, category_id, id)
{
    $('#title-update').val(title);
    $('#category_id-update').val(category_id);
    $('#id-update').val(id);

        
    $('.update-form').removeClass('d-none');


}
</script>