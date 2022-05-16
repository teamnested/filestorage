<?php include('common/header.php') ?>

<div class="wrapper">
    <?php include('common/sidebar.php') ?>
    <?php include('common/navbar.php') ?>
    <div class="content-page">
        <?php if (!isset($_GET['slug'])) : ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex align-items-center justify-content-between welcome-content mb-3">
                            <h4>All Folders</h4>
                            <div class="d-flex align-items-center">
                                <div class="list-grid-toggle mr-4">
                                    <span class="icon icon-grid i-grid"><i class="ri-layout-grid-line font-size-20"></i></span>
                                    <span class="icon icon-grid i-list"><i class="ri-list-check font-size-20"></i></span>
                                    <span class="label label-list">List</span>
                                </div>
                                <div class="dashboard1-dropdown d-flex align-items-center">
                                    <div class="dashboard1-info rounded">
                                        <a href="#calander" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                            <i class="ri-arrow-down-s-line"></i>
                                        </a>
                                        <ul id="calander" class="iq-dropdown collapse list-inline m-0 p-0 mt-2">
                                            <li class="mb-2">
                                                <a href="#" data-toggle="tooltip" data-placement="right" title="Calander"><i class="las la-calendar iq-arrow-left"></i></a>
                                            </li>
                                            <li class="mb-2">
                                                <a href="#" data-toggle="tooltip" data-placement="right" title="Keep"><i class="las la-lightbulb iq-arrow-left"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" data-placement="right" title="Tasks"><i class="las la-tasks iq-arrow-left"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="icon icon-grid i-grid">
                    <div class="row">
                        <?php foreach (getFolders() as $key => $folder) : ?>
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <div class="card card-block card-stretch card-height">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <a href="<?php echo BASE_URL . 'folders?slug=' . $folder['slug'] ?>" class="folder">
                                                <div class="icon-small bg-danger rounded mb-4">
                                                    <i class="ri-folder-line"></i>
                                                </div>
                                            </a>
                                            <div class="card-header-toolbar">
                                                <div class="dropdown">
                                                    <span class="dropdown-toggle" id="dropdownMenuButton2" data-toggle="dropdown">
                                                        <i class="ri-more-2-fill"></i>
                                                    </span>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton2">
                                                        <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                                        <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                                        <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                                        <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="<?php echo BASE_URL . 'folders/files' ?>" class="folder">
                                            <h6 class="mb-2"><?php echo $folder['name'] ?></h6>
                                            <p class="mb-2"><i class="lar la-clock text-danger mr-2 font-size-16"></i> 10 Dec, 2020</p>
                                            <p class="mb-0"><i class="las la-file-alt text-danger mr-2 font-size-16"></i> <?php echo $folder['total_files'] ?> Files</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="icon icon-grid i-list">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-borderless tbl-server-info">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Owner</th>
                                                    <th scope="col">Last Edit</th>
                                                    <th scope="col">File Size</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($folders as $key => $folder) : ?>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="icon-small bg-danger rounded mr-3">
                                                                    <i class="ri-folder-line"></i>
                                                                </div>
                                                                <div data-load-file="file" data-load-target="#resolte-contaniner" data-url="assets/vendor/doc-viewer/files/demo.pdf" data-toggle="modal" data-target="#exampleModal" data-title="alexa5.pdf" style="cursor: pointer;"><?php echo $folder['name'] ?></div>
                                                            </div>
                                                        </td>
                                                        <td>Me</td>
                                                        <td><?php echo $folder['name'] ?></td>
                                                        <td>10 MB</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <span class="dropdown-toggle" id="dropdownMenuButton10" data-toggle="dropdown">
                                                                    <i class="ri-more-fill"></i>
                                                                </span>
                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton10">
                                                                    <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                                                    <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                                                    <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                                                    <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                                                    <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else :
            $slug = $_GET['slug'];
            $files = getFilesByFolderSlug($slug);
        ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex align-items-center justify-content-between welcome-content mb-3">
                            <h4>All Files</h4>
                            <div class="d-flex align-items-center">
                                <div class="list-grid-toggle mr-4">
                                    <span class="icon icon-grid i-grid"><i class="ri-layout-grid-line font-size-20"></i></span>
                                    <span class="icon icon-grid i-list"><i class="ri-list-check font-size-20"></i></span>
                                    <span class="label label-list">List</span>
                                </div>
                                <div class="dashboard1-dropdown d-flex align-items-center">
                                    <div class="dashboard1-info rounded">
                                        <a href="#calander" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                            <i class="ri-arrow-down-s-line"></i>
                                        </a>
                                        <ul id="calander" class="iq-dropdown collapse list-inline m-0 p-0 mt-2">
                                            <li class="mb-2">
                                                <a href="#" data-toggle="tooltip" data-placement="right" title="Calander"><i class="las la-calendar iq-arrow-left"></i></a>
                                            </li>
                                            <li class="mb-2">
                                                <a href="#" data-toggle="tooltip" data-placement="right" title="Keep"><i class="las la-lightbulb iq-arrow-left"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" data-placement="right" title="Tasks"><i class="las la-tasks iq-arrow-left"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="icon icon-grid i-grid">
                    <div class="row">
                        <?php foreach ($files as $key => $file) : ?>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-block card-stretch card-height">
                                    <div class="card-body image-thumb">
                                        <div class="mb-4 text-center p-3 rounded iq-thumb">
                                            <div class="iq-image-overlay"></div>
                                            <a href="#" data-title="Spike.pdf" data-load-file="file" data-load-target="#resolte-contaniner" data-url="assets/vendor/doc-viewer/files/demo.pdf" data-toggle="modal" data-target="#exampleModal">
                                                <img src="assets/images/layouts/page-7/pdf.png" class="img-fluid" alt="image1">
                                            </a>
                                        </div>
                                        <h6>Spike.pdf</h6>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="icon icon-grid i-list">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-block card-stretch card-height">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-borderless tbl-server-info">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Owner</th>
                                                    <th scope="col">Last Edit</th>
                                                    <th scope="col">File Size</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="icon-small bg-danger rounded mr-3">
                                                                <i class="ri-file-excel-line"></i>
                                                            </div>
                                                            <div data-load-file="file" data-load-target="#resolte-contaniner" data-url="assets/vendor/doc-viewer/files/demo.pdf" data-toggle="modal" data-target="#exampleModal" data-title="alexa5.pdf" style="cursor: pointer;">Weekly Report.pdf</div>
                                                        </div>
                                                    </td>
                                                    <td>Me</td>
                                                    <td>Mar 30, 2020 Gail Forcewind</td>
                                                    <td>10 MB</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <span class="dropdown-toggle" id="dropdownMenuButton10" data-toggle="dropdown">
                                                                <i class="ri-more-fill"></i>
                                                            </span>
                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton10">
                                                                <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="icon-small bg-primary rounded mr-3">
                                                                <i class="ri-file-download-line"></i>
                                                            </div>
                                                            <div data-load-file="file" data-load-target="#resolte-contaniner" data-url="assets/vendor/doc-viewer/files/demo.docx" data-toggle="modal" data-target="#exampleModal" data-title="alexa6.docx" style="cursor: pointer;">Milestone.docx</div>
                                                        </div>
                                                    </td>
                                                    <td>Penny</td>
                                                    <td>Mar 31, 2020 Penny</td>
                                                    <td>65 MB</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <span class="dropdown-toggle" id="dropdownMenuButton11" data-toggle="dropdown">
                                                                <i class="ri-more-fill"></i>
                                                            </span>
                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton11">
                                                                <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="icon-small bg-info rounded mr-3">
                                                                <i class="ri-file-excel-line"></i>
                                                            </div>
                                                            <div data-title="Alexa8.xlsx" data-load-file="file" data-load-target="#resolte-contaniner" data-url="assets/vendor/doc-viewer/files/demo.xlsx" data-toggle="modal" data-target="#exampleModal" style="cursor: pointer;">Training center.xlsx</div>
                                                        </div>
                                                    </td>
                                                    <td>Banny</td>
                                                    <td>Mar 30, 2020 Banny</td>
                                                    <td>90 MB</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <span class="dropdown-toggle" id="dropdownMenuButton13" data-toggle="dropdown">
                                                                <i class="ri-more-fill"></i>
                                                            </span>
                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton13">
                                                                <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="icon-small bg-success rounded mr-3">
                                                                <i class="ri-file-excel-line"></i>
                                                            </div>
                                                            <div data-load-file="file" data-load-target="#resolte-contaniner" data-url="assets/vendor/doc-viewer/files/demo.docx" data-toggle="modal" data-target="#exampleModal" data-title="alexa7.pptx" style="cursor: pointer;">Flavour.pptx</div>
                                                        </div>
                                                    </td>
                                                    <td>Me</td>
                                                    <td>Apr 04, 2020 me</td>
                                                    <td>10 MB</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <span class="dropdown-toggle" id="dropdownMenuButton12" data-toggle="dropdown">
                                                                <i class="ri-more-fill"></i>
                                                            </span>
                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton12">
                                                                <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                                                <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </div>
</div>
<?php include('common/footer.php') ?>