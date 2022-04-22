<div class="iq-sidebar  sidebar-default ">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="<?php echo BASE_URL.'dashboard'?>" class="header-logo">File Storage
            <!-- <img src="assets/images/logo.png" class="img-fluid rounded-normal light-logo" alt="logo">
            <img src="assets/images/logo-white.png" class="img-fluid rounded-normal darkmode-logo" alt="logo"> -->
        </a>
        <div class="iq-menu-bt-sidebar">
            <i class="las la-bars wrapper-menu"></i>    
        </div>
    </div>
    <div class="data-scrollbar" data-scroll="1">
        <div class="new-create select-dropdown input-prepend input-append">
            <div class="btn-group">
                <label data-toggle="dropdown">
                    <div class="search-query selet-caption"><i class="las la-plus pr-2"></i>Create New</div><span class="search-replace"></span>
                    <span class="caret">
                        <!--icon-->
                    </span>
                </label>
                <ul class="dropdown-menu">
                    <li>
                        <div class="item"><i class="ri-folder-add-line pr-3"></i>New Folder</div>
                    </li>
                    <li>
                        <div class="item"><i class="ri-file-upload-line pr-3"></i>Upload Files</div>
                    </li>
                    <li>
                        <div class="item"><i class="ri-folder-upload-line pr-3"></i>Upload Folders</div>
                    </li>
                </ul>
            </div>
        </div>
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="active">
                    <a href="index.php" class="">
                        <i class="las la-home iq-arrow-left"></i><span>Dashboard</span>
                    </a>
                    <ul id="dashboard" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>

                <li class=" ">
                    <a href="files.php" class="">
                        <i class="lar la-file-alt iq-arrow-left"></i><span>Files</span>
                    </a>
                    <ul id="page-files" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>
                <li class=" ">
                    <a href="recent-files.php" class="">
                        <i class="las la-stopwatch iq-arrow-left"></i><span>Recent</span>
                    </a>
                    <ul id="page-folders" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>
                <li class=" ">
                    <a href="fav-page.php" class="">
                        <i class="lar la-star"></i><span>Favourite</span>
                    </a>
                    <ul id="page-fevourite" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>
                <li class=" ">
                    <a href="trash.php" class="">
                        <i class="las la-trash-alt iq-arrow-left"></i><span>Trash</span>
                    </a>
                    <ul id="page-delete" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>

            </ul>
        </nav>
        <div class="sidebar-bottom">
            <h4 class="mb-3"><i class="las la-cloud mr-2"></i>Storage</h4>
            <p>17.1 / 20 GB Used</p>
            <div class="iq-progress-bar mb-3">
                <span class="bg-primary iq-progress progress-1" data-percent="67">
                </span>
            </div>
            <p>75% Full - 3.9 GB Free</p>
            <a href="#" class="btn btn-outline-primary view-more mt-4">Buy Storage</a>
        </div>
        <div class="p-3"></div>
    </div>
</div>