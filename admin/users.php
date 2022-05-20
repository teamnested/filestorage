<?php include("common/header.php"); ?>
<div class="wrapper">
    <?php include("common/sidebar.php"); ?>
    <div class="main">
        <?php include("common/navbar.php"); ?>
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Manage Users
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo BASE_URL . 'admin/dashboard' ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Users</li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Manage Users</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <?php
                                        if (isset($_SESSION['message'])) { ?>
                                            <div class="alert alert-<?php echo $_SESSION['is_user_action_success'] ? 'success' : 'danger' ?> alert-dismissible" role="alert">
                                                <div class="alert-message">
                                                    <?php echo $_SESSION['message'] ?>
                                                </div>

                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                        <?php
                                            unset($_SESSION['message']);
                                        } ?>
                                    </div>
                                </div>
                                <table id="datatables-buttons" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Total Folders</th>
                                            <th>Total Files</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach (getUsers() as $key => $user) : ?>
                                            <tr>
                                                <td><?php echo $user['first_name'] . ' ' . $user['last_name'] ?></td>
                                                <td><?php echo $user['email'] ?></td>
                                                <td><?php echo $user['total_folders'] ?></td>
                                                <td><?php echo $user['total_files'] ?></td>
                                                <td>
                                                    <?php
                                                    if ($user['is_verified'] == 1) : ?>
                                                        <span class="badge badge-pill badge-success">Verified</span>
                                                    <?php else : ?>
                                                        <span class="badge badge-pill badge-danger">Unverified</span>
                                                    <?php endif ?>
                                                </td>
                                                <td>
                                                    <a onclick="return confirm('Are you sure you want to verify <?php echo $user['first_name'] . ' ' . $user['last_name'] ?>?')" href="<?php echo BASE_URL . 'admin/action/users/verify?id=' . $user['id'] ?>" class="btn btn-info btn-sm">
                                                        <i class="fas fa-check"></i> Verify
                                                    </a>
                                                    <a onclick="return confirm('Are you sure you want to delete <?php echo $user['first_name'] . ' ' . $user['last_name'] ?>?')" href="<?php echo BASE_URL . 'admin/action/users/delete?id=' . $user['id'] ?>" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Total Folders</th>
                                            <th>Total Files</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include("common/footer.php"); ?>
    </div>
</div>
<svg width="0" height="0" style="position:absolute">
    <defs>
        <symbol viewBox="0 0 512 512" id="ion-ios-pulse-strong">
            <path d="M448 273.001c-21.27 0-39.296 13.999-45.596 32.999h-38.857l-28.361-85.417a15.999 15.999 0 0 0-15.183-10.956c-.112 0-.224 0-.335.004a15.997 15.997 0 0 0-15.049 11.588l-44.484 155.262-52.353-314.108C206.535 54.893 200.333 48 192 48s-13.693 5.776-15.525 13.135L115.496 306H16v31.999h112c7.348 0 13.75-5.003 15.525-12.134l45.368-182.177 51.324 307.94c1.229 7.377 7.397 11.92 14.864 12.344.308.018.614.028.919.028 7.097 0 13.406-3.701 15.381-10.594l49.744-173.617 15.689 47.252A16.001 16.001 0 0 0 352 337.999h51.108C409.973 355.999 427.477 369 448 369c26.511 0 48-22.492 48-49 0-26.509-21.489-46.999-48-46.999z">
            </path>
        </symbol>
    </defs>
</svg>

<?php include("common/scripts.php"); ?>

</body>

</html>