<!DOCTYPE html>
<html>
  <body>
    <h2>Show Address</h2>
    <a href="<?php echo route('demo') ;?>">List</a> | <a href="<?php echo route('demo/add');?>">Add New</a>
    <br /><br />
      Name:<br>
      <input type="text" name="name" value="<?php echo $book->name; ?>" readonly> <br>
      First name:<br>
      <input type="text" name="firstname" value="<?php echo $book->firstname; ?>" readonly> <br>
      Street:<br>
      <input type="text" name="street" value="<?php echo $book->street; ?>" readonly> <br>
      Zip Code:<br>
      <input type="text" name="zip_code" value="<?php echo $book->zip_code; ?>" readonly> <br>
      City:<br>
      <input type="text" name="city" value="<?php echo $book->city; ?>" readonly> <br><br>
        <?php
        $path = '/uploads/images/';
        $image = $path.$book->image;
        if(!$book->image){
            $image = $path."no-image.jpg";
        }
        ?>
        <img src="<?php echo asset($image);?>" width="85" height="70">
    </form>

  </body>
</html>
