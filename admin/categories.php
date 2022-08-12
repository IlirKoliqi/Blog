
<?php 
use Admin\Libs\Category;
include "inc/header.php";
include "inc/adminnav.php" ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">List of users</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable Example</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th>Name</th>
                                    <th>Description</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $category = new Category();
                                foreach ($category->find_all() as $cat) {
                                    echo "<tr>";
                                    echo "<td>". $cat->getName() . "</td>";
                                    echo "<td>". $cat->getDescription() . "</td>";
                                    echo "<td><a href='edit_category.php?categoryid=". $cat->getId() ."'>Edit</td>";
                                    echo "<td><a href='delete_category.php?categoryid=". $cat->getId() ."'>Delete</a></td>";
                                    echo "</tr>";

                                }
                    
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include "inc/footer.php" ?>