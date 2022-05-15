<table>
    <tr>
        <th>ID</th>
        <th>title</th>
        <th>views</th>
    </tr>

    <?php
        require "login.php";
        $posts = mysqli_query($db, "SELECT * FROM `posts`");
        $posts = mysqli_fetch_all($posts);
        foreach ($posts as $post) {
            ?>
            <tr>
                <td><?= $post["0"] ?></td>
                <td><?= $post["1"] ?></td>
                <td><?= $post["5"] ?></td>
                <td><a href="test.php?id=<?= $post["0"] ?>">open</a> </td>
                <td><a href="edit.php?id=<?= $post["0"] ?>">edit</a> </td>
                <td><a href="delete.php?id=<?= $post["0"] ?>">delete</a> </td>
            </tr>
            <?php
        }
    ?>
<!--    <tr>-->
<!--        <td>10</td>-->
<!--        <td>test</td>-->
<!--        <td>10</td>-->
<!--        <td><a href="test.php">open</a> </td>-->
<!--    </tr>-->
</table>





<form action="testDb/test.php" method="post">
    <p>Title</p>
    <input type="text" name="title">
    <p>Text</p>
    <textarea name="text"></textarea>
    <p>category_id</p>
    <input type="number" name="category_id">
    <p>author_id</p>
    <input type="number" name="author_id">
    <p>views</p>
    <input type="number" name="views"> <br> <br>
    <button type="submit">GO</button>
</form>
