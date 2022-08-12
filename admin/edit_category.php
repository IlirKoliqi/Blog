<?php

use Admin\Libs\Category;

include "inc/header.php";
include "inc/adminnav.php" ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Categories</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Categories</li>
            </ol>
            <div class="row justify-content-center">
                <?php
                $category = new Category();
                if (isset($_GET['categoryid'])) {
                    $category = $category->find_id(($_GET['categoryid']));
                }
                if (isset($_POST['update_category'])) {
                    $category->setName($_POST['name']);
                    $category->setDescription($_POST['description']);
                    $category->update();
                }

                ?>
                <div class="col-lg-9">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-2">Create User</h3>
                        </div>

                        <div class="card-body">
                            <form method="post" action="">
                                <div class="form-group">
                                    <label class="small mb-1" for="name">Name :</label>
                                    <input class="form-control py-4" name="name" id="name" type="text" 
                                    placeholder="Enter name" value="<?php if(!empty($category->getName())){ echo $category->getName();} ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="description">Description :</label>
                                    <input class="form-control py-4" name="description" id="description" type="text" 
                                    placeholder="Enter last name" value="<?php if(!empty($category->getDescription())){ echo $category->getDescription();} ?>" />
                                </div>

                                <input class="btn btn-primary" id="login" value="Update Category" type="submit" name="update_category" />
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