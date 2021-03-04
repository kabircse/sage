<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content pt-2 pb-0">
        <div class="container-fluid">
            <div class=""><?php echo $title; ?></div>
            <div class="row">
                <!-- left column -->
                <div class="col-10">
                    <!-- card -->
                    <div class="card card-info card-outline">
                        <div class="card-header p-1">
                            <span class="card-title">User List</span>
                            <a class="float-right" href="<?php echo route('user/create'); ?>">Add New</a>
                        </div>
                        <div class="card-body-x p-1">
                            <?php
                            if (empty($users))
                                echo "There is no data";
                            else {
                                ?>
                                <table class="table table-sm table-hover table-responsive-x">
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                    <?php foreach ($users as $key=>$row) { ?>
                                        <tr>
                                            <td><?php echo $pageSize*($page-1)+($key+1); ?></td>
                                            <td><?php echo $row->name; ?></td>
                                            <td><?php echo $row->user_name; ?></td>
                                            <td><?php echo $row->email; ?></td>
                                            <td><?php echo $roles[$row->role_id] ?? ''; ?></td>
                                            <td>
                                                <a href="<?php echo route('user/edit/' . $row->id); ?>" class="btn btn-xs page-link">Edit</a>
                                            </td>
                                            <td>
                                                <form action="<?php echo route('user/delete/'. $row->id); ?>" class="delete_btn" method="post">
                                                    <input type="submit" value="Delete" class="page-link btn btn-xs btn-danger">
                                                </form>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item <?php echo $page==1?'disabled':'';?>"><a class="page-link" href='<?php echo route("user/index?page=".($page-1));?>'>Prev</a></li>
                                            <li class="page-item <?php echo $page==$total_page?'disabled':'';?>"><a class="page-link" href='<?php echo route("user/index?page=".($page+1));?>'>Next</a></li>
                                        </ul>
                                    </nav>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
