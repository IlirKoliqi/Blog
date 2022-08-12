
<?php 
use Admin\Libs\User, Admin\Libs\Category;
include "inc/header.php";
include "inc/adminnav.php" ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
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
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $user = new User();
                                foreach ($user->find_all() as $u) {
                                    echo "<tr>";
                                    echo "<td>". $u->getFirstname() . "</td>";
                                    echo "<td>". $u->getLastname() . "</td>";
                                    echo "<td>". $u->getPhone() . "</td>";
                                    echo "<td>". $u->getEmail() . "</td>";
                                    echo "<td><a href='#'>Edit</td>";
                                    echo "<td><a href='#'>Delete</a></td>";
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