<?php echo validation_errors(); ?>

<?php echo form_open('pages/create'); ?>

    <label for="name">name</label>
    <input type="text" name="name" /><br />

    <label for="age">age</label>
    <input type="text" name="age" /><br />

    <input type="submit" name="submit" value="Create new users" />

</form>