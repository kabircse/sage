<p>1. Using Validation error with old values:</p>
<form action="<?php echo URL?>demo/save" method="post">
    <?php echo csrf_field();?>
  Name:<br>
  <input type="text" name="name" value="<?php echo old('name');?>">
    <?php if(isset($errors['name'])):?>
    <span class="text-danger"><?php echo $errors['name'][0]; ?></span>
    <?php endif;?> <br />
  First name:<br>
  <input type="text" name="firstname" value="<?php echo old('firstname');?>">
    <?php if(isset($errors['firstname'])):?>
        <span class="text-danger"><?php echo $errors['firstname'][0]; ?></span>
    <?php endif;?>  <br />
  <input type="submit" value="Submit">
</form>
<hr />
<p>2. Using Session:</p>
<?php
    //session set with array
    $session = [
        'name' => 'Kabir',
        'age' => 30,
        'logged_in' => true
    ];
    session($session);
    //session data read through key
    echo " name:".session('name');
    echo " name:".session_get('name');
    
    //session data remove through key
    echo " forget name:".session_forget('name');
    echo " age: ".session('age',null);

    //session data set through key
    echo " age: ".session('age',null);
    echo " age: ".session_put('age',45);
    
    //echo " session destroy all:".var_dump(session_empty());
    
    echo " session all:".var_dump(session_all());
?>
<hr>
<p>2. Using CSRF:</p>
<?php
echo " Form csrf hidden method with token: csrf_field()"; echo '<br />';
echo " csrf token on session: session('token')";
?>
<hr />
