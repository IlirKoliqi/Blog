<?php

use Admin\Libs\User;

include "inc/header.php";
include "inc/adminnav.php" ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Users</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Users</li>
            </ol>
            <div class="row justify-content-center">
                <?php
                $user = new User();
                if (isset($_GET['userid'])) {
                    $user = $user->find_id(($_GET['userid']));
                }
                if (isset($_POST['update_user'])) {
                    $user->setFirstname($_POST['firstname']);
                    $user->setLastname($_POST['lastname']);
                    $user->setPhone($_POST['phone']);
                    $user->setEmail($_POST['email']);
                    $user->setPassword($_POST['password']);
                    if(!empty($_FILES['image']['name'])){
                        $user->setPhotoImage($_FILES['image']);
                    }
                    if($user->update()){
                        $session->message("User modified succesfully");
                        header("Location: users.php"); 
                    }
                }

                ?>
                <div class="col-lg-9">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-2">Create User</h3>
                        </div>

                        <div class="card-body">
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="small mb-1" for="firstname">First Name :</label>
                                    <input class="form-control py-4" name="firstname" id="firstname" type="text" 
                                    placeholder="Enter first name" value="<?php if(!empty($user->getFirstname())){ echo $user->getFirstname();} ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="lastname">Last Name :</label>
                                    <input class="form-control py-4" name="lastname" id="lastname" type="text" 
                                    placeholder="Enter last name" value="<?php if(!empty($user->getLastname())){ echo $user->getLastname();} ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="phone">Phone Number :</label>
                                    <input class="form-control py-4" name="phone" id="phone" type="text" 
                                    placeholder="Enter phone number" value="<?php if(!empty($user->getPhone())){ echo $user->getPhone();} ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="email">Email Address :</label>
                                    <input class="form-control py-4" name="email" id="email" type="text" 
                                    placeholder="Enter email address" value="<?php if(!empty($user->getEmail())){ echo $user->getEmail();} ?>"  />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="email">Password :</label>
                                    <input class="form-control py-4" name="password" id="password" type="password" 
                                    placeholder="Enter email password" value="<?php if(!empty($user->getPassword())){ echo $user->getPassword();} ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="email">Profile Photo :</label>
                                    <img class="photoimg" src="uploads/<?php if(!empty($user->getPhoto()))
                                    { echo $user->getPhoto();} ?>" />
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="image">Profile Photo:</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="image">Choose Profile Photo</label>
                                    </div>
                                </div>
                                
                                <input class="btn btn-primary" id="login" value="Update User" type="submit" name="update_user" />
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <div class="small">
                                <a href="register.html">
                                    Have an account? Go to login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>

    <?php include "inc/footer.php" ?>