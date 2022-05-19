<footer class="iq-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                    <li class="list-inline-item"><a href="#">Terms of Use</a></li>
                </ul>
            </div>
            <div class="col-lg-6 text-right">
                Copyright 2021 - <?php echo date('Y') ?> <a href="<?php echo BASE_URL . 'dashboard' ?>">File Storage</a> All Rights Reserved.
            </div>
        </div>
    </div>
</footer>

<?php include 'common/modals/create-folder.php'; ?>
<?php include 'common/modals/upload-file.php'; ?>

<!-- Backend Bundle JavaScript -->
<script src="<?php echo BASE_URL . 'assets/js/backend-bundle.min.js' ?>"></script>

<!-- Chart Custom JavaScript -->
<script src="<?php echo BASE_URL . 'assets/js/customizer.js' ?>"></script>

<!-- Chart Custom JavaScript -->
<script src="<?php echo BASE_URL . 'assets/js/chart-custom.js' ?>"></script>

<!--PDF-->
<script src="<?php echo BASE_URL . 'assets/vendor/doc-viewer/include/pdf/pdf.js' ?>"></script>
<!--Docs-->
<script src="<?php echo BASE_URL . 'assets/vendor/doc-viewer/include/docx/jszip-utils.js' ?>"></script>
<script src="<?php echo BASE_URL . 'assets/vendor/doc-viewer/include/docx/mammoth.browser.min.js' ?>"></script>
<!--PPTX-->
<script src="<?php echo BASE_URL . 'assets/vendor/doc-viewer/include/PPTXjs/js/filereader.js' ?>"></script>
<script src="<?php echo BASE_URL . 'assets/vendor/doc-viewer/include/PPTXjs/js/d3.min.js' ?>"></script>
<script src="<?php echo BASE_URL . 'assets/vendor/doc-viewer/include/PPTXjs/js/nv.d3.min.js' ?>"></script>
<script src="<?php echo BASE_URL . 'assets/vendor/doc-viewer/include/PPTXjs/js/pptxjs.js' ?>"></script>
<script src="<?php echo BASE_URL . 'assets/vendor/doc-viewer/include/PPTXjs/js/divs2slides.js' ?>"></script>
<!--All Spreadsheet -->
<script src="<?php echo BASE_URL . 'assets/vendor/doc-viewer/include/SheetJS/handsontable.full.min.js' ?>"></script>
<script src="<?php echo BASE_URL . 'assets/vendor/doc-viewer/include/SheetJS/xlsx.full.min.js' ?>"></script>
<!--Image viewer-->
<script src="<?php echo BASE_URL . 'assets/vendor/doc-viewer/include/verySimpleImageViewer/js/jquery.verySimpleImageViewer.js' ?>"></script>
<!--officeToHtml-->
<script src="<?php echo BASE_URL . 'assets/vendor/doc-viewer/include/officeToHtml/officeToHtml.js' ?>"></script>
<script src="<?php echo BASE_URL . 'assets/js/doc-viewer.js' ?>"></script>
<!-- app JavaScript -->
<script src="<?php echo BASE_URL . 'assets/js/app.js' ?>"></script>

<script>
    $(function() {
        <?php
        if (isset($_SESSION['is_folder_created'])) :
            if (!$_SESSION['is_folder_created']) : ?>
                $('#createFolderModal').modal('show');
        <?php
                unset($_SESSION['is_folder_created'], $_SESSION['message']);
            endif;
        endif
        ?>
    });

    var config = {
        // replace the publicKey with yours
        "publicKey": "test_public_key_78feb4a65e62452c97de0cc179a8cf60",
        "productIdentity": "1234567890",
        "productName": "Dragon",
        "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
        "paymentPreference": [
            "KHALTI",
            "EBANKING",
            "MOBILE_BANKING",
            "CONNECT_IPS",
            "SCT",
        ],
        "eventHandler": {
            onSuccess(payload) {
                // hit merchant api for initiating verfication
                console.log(payload);
            },
            onError(error) {
                console.log(error);
            },
            onClose() {
                console.log('widget is closing');
            }
        }
    };

    var checkout = new KhaltiCheckout(config);
    var btn = document.querySelector("#khaltiPaymentBtn");
    btn.onclick = function() {
        // minimum transaction amount must be 10, i.e 1000 in paisa.
        checkout.show({
            amount: 1000
        });
    }
</script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Title</h4>
                <div>
                    <a class="btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
            </div>
            <div class="modal-body">
                <div id="resolte-contaniner" style="height: 500px;" class="overflow-auto">
                    File not found
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>