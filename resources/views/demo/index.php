<h2>Address Book List</h2>
<a href="<?php echo route('demo/add'); ?>">Add New</a> || <a href="<?php echo route('demo/demo-code')?>">Code Using Demo</a>
<br/><br/>

<?php //if(session('notification_type')):?>
<!--    <p class="btn text-danger">-->
<!--        --><?php //echo session('notification_message'); ?>
<!--    </p>-->
<?php //endif;
//reset
//session('notification_type',[]);
?>

<?php
    if (empty($address))
        echo "There is no data";
    else {
        ?>
        <table class="table table-striped table-sm">
            <tr>
                <th>Name</th>
                <th>First Name</th>
                <th>City</th>
                <th>Image</th>
                <th colspan="2">Action</th>
            </tr>
            <?php foreach ($address as $row) { ?>
                <tr>
                    <td><?php echo $row->name; ?></td>
                    <td><?php echo $row->firstname; ?></td>
                    <td><?php echo $row->city; ?></td>
                    <?php
                    $path = '/uploads/images/';
                    $image = $path.$row->image;
                    if(!$row->image){
                        $image = $path."no-image.jpg";
                    }
                    ?>
                    <td><img src="<?php echo asset($image);?>" width="85" height="70"></td>
                    <td>
                        <a href="<?php echo route('demo/status/' . $row->id.'/'.'jobs'); ?>">Status</a>
                        <a href="<?php echo route('demo/show/' . $row->id); ?>">View</a>
                        <a href="<?php echo route('demo/edit/' . $row->id); ?>">Edit</a>
                        <form action="<?php echo route('demo/delete/'. $row->id); ?>" method="post">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>
