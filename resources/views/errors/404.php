<?php
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
?>
    <h1 style="color: red">URL not found.</h1>
    <?php
        $previous = "javascript:history.go(-1)";
        if(isset($_SERVER['HTTP_REFERER'])) {
            $previous = filter_var($_SERVER['HTTP_REFERER'],FILTER_VALIDATE_URL);
        }
    ?>
    <h3>Please <a href="<?php echo $previous ?>">go back</a> and try again.</h3>
    