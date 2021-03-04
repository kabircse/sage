<h2>Add New</h2>
<a href="<?php echo URL?>demo">List</a>
<br /><br />

<!--No need this notification because it is working form footer-->
<?php if(session('notification_type')):?>
    <p class="btn text-danger">
        <?php echo session('notification_message'); ?>
    </p>
<?php endif;
    //reset it after displaying
    session('notification_type',[]);
?>

<form action="<?php echo URL?>demo/save" method="post" enctype="multipart/form-data">
  Name:<br>
  <input type="text" name="name" value="<?php echo old($inputs,'name');?>"> <br>
    <?php if(isset($errors['name'])):?>
    <span class="text-danger"><?php echo $errors['name'][0]; ?></span>
    <?php endif;?> <br />
  First name:<br>
  <input type="text" name="firstname" value="<?php echo old($inputs,'firstname');?>"> <br>
    <?php if(isset($errors['firstname'])):?>
        <span class="text-danger"><?php echo $errors['firstname'][0]; ?></span>
    <?php endif;?>       <br />
  Street:<br>
  <input type="text" name="street" value="<?php echo old($inputs,'street');?>"> <br>
    <?php if(isset($errors['street'])):?>
        <span class="text-danger"><?php echo $errors['street'][0]; ?></span>
    <?php endif;?>       <br />
  Zip Code:<br>
  <input type="text" name="zip_code" value="<?php echo old($inputs,'zip_code');?>"> <br>
    <?php if(isset($errors['zip_code'])):?>
    <span class="text-danger"><?php echo $errors['zip_code'][0]; ?></span>
    <?php endif;?>       <br />
  City:<br>
  <input type="text" name="city" value="<?php echo old($inputs,'city');?>"> <br>
    <?php if(isset($errors['city'])):?>
    <span class="text-danger"><?php echo $errors['city'][0]; ?></span>
    <?php endif;?>       <br />

    <input type="file" name="image"> <br>
    <?php if(isset($errors['image'])):?>
        <span class="text-danger"><?php echo $errors['image'][0]; ?></span>
    <?php endif;?>       <br />
    <?php if(isset($errors['image.error'])):?>
        <span class="text-danger"><?php echo explode('.',$errors['image.error'][0])[0]; ?></span>
    <?php endif;?>
    <?php if(isset($errors['image.type'])):?>
        <span class="text-danger"><?php echo explode('.',$errors['image.type'][0])[0]; ?></span>
    <?php endif;?>
    <?php if(isset($errors['image.size'])):?>
        <span class="text-danger"><?php echo explode('.',$errors['image.size'][0])[0]; ?></span>
    <?php endif;?>
  <input type="submit" value="Submit">
</form>