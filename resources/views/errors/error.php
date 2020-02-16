<?php
    header( $_SERVER["SERVER_PROTOCOL"] . 'Error');
?>
    <h1 style="color: red"><?php echo $error ?? '';?></h1>

    <?php
    $previous = "javascript:history.go(-1)";
    if(isset($_SERVER['HTTP_REFERER'])) {
        $previous = filter_var($_SERVER['HTTP_REFERER'],FILTER_VALIDATE_URL);
    }
    ?>
    <h3>Please <a href="<?php echo $previous ?>">go back</a> and try again.</h3>
<!--    <h3>Please <a href="--><?php //echo route(''); ?><!--">go back</a> and try again.</h3>-->
    