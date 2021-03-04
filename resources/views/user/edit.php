<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content pt-2 pb-0">
        <div class="container-fluid">
            <div class=""><?php echo $title; ?></div>
            <form action="<?php echo route("user/update/".$user->id);?>" class="role" method="post">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-10">
                        <!-- card -->
                        <div class="card card-info card-outline">
                            <div class="card-header p-1">
                                <span class="card-title">User Information</span>
                                <a class="float-right" href="<?php echo route('user/index'); ?>">List</a>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-2">
                                    <label class="m-0" for="LeaveRuleID">Name</label>
                                    <?php echo form_input('name','text',$user->name,'class="form-control form-control-sm" id="name" placeholder="Type name" required'); ?>
                                    <?php if(isset($errors['name'])):?>
                                        <span class="text-danger"><?php echo $errors['name'][0]; ?></span>
                                    <?php endif;?>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="m-0" for="Description">Email</label>
                                    <?php
                                    echo form_input('email','email',$user->email,$attribute='class="form-control" rows="2" placeholder="Type email" id="email"');
                                    ?>
                                    <?php if(isset($errors['email'])):?>
                                        <span class="text-danger"><?php echo $errors['email'][0]; ?></span>
                                    <?php endif;?>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="m-0" for="user_name">User Name</label>
                                    <?php echo form_input('user_name','text',$user->user_name,'class="form-control form-control-sm" id="user_name" placeholder="Type user id" required'); ?>
                                    <?php if(isset($errors['user_name'])):?>
                                        <span class="text-danger"><?php echo $errors['user_name'][0]; ?></span>
                                    <?php endif;?>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="m-0" for="password">User Password</label>
                                    <?php
                                    echo form_input('password','password',null,$attribute='class="form-control" rows="2" placeholder="Type password" id="password"');
                                    ?>
                                    <?php if(isset($errors['password'])):?>
                                        <span class="text-danger"><?php echo $errors['password'][0]; ?></span>
                                    <?php endif;?>
                                </div>
                                <div class="form-group mb-2 row">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input IsActive" id="IsActive" value="1" name="IsActive" <?php echo $user->is_active==1 ?'checked':''; ?> />
                                            <label class="form-check-label mb-0" for="IsActive">Is active</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="submit" class="btn btn-info float-right" value="Submit" />
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.card-body -->
                <!-- /.row -->
            </form>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>