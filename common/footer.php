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
                Copyright 2021 - <?php echo date('Y') ?> <a href="<?php echo BASE_URL.'dashboard'?>">File Storage</a> All Rights Reserved.
            </div>
        </div>
    </div>
</footer>
<!-- Backend Bundle JavaScript -->
<script src="assets/js/backend-bundle.min.js"></script>

<!-- Chart Custom JavaScript -->
<script src="assets/js/customizer.js"></script>

<!-- Chart Custom JavaScript -->
<script src="assets/js/chart-custom.js"></script>

<!--PDF-->
<script src="assets/vendor/doc-viewer/include/pdf/pdf.js"></script>
<!--Docs-->
<script src="assets/vendor/doc-viewer/include/docx/jszip-utils.js"></script>
<script src="assets/vendor/doc-viewer/include/docx/mammoth.browser.min.js"></script>
<!--PPTX-->
<script src="assets/vendor/doc-viewer/include/PPTXjs/js/filereader.js"></script>
<script src="assets/vendor/doc-viewer/include/PPTXjs/js/d3.min.js"></script>
<script src="assets/vendor/doc-viewer/include/PPTXjs/js/nv.d3.min.js"></script>
<script src="assets/vendor/doc-viewer/include/PPTXjs/js/pptxjs.js"></script>
<script src="assets/vendor/doc-viewer/include/PPTXjs/js/divs2slides.js"></script>
<!--All Spreadsheet -->
<script src="assets/vendor/doc-viewer/include/SheetJS/handsontable.full.min.js"></script>
<script src="assets/vendor/doc-viewer/include/SheetJS/xlsx.full.min.js"></script>
<!--Image viewer-->
<script src="assets/vendor/doc-viewer/include/verySimpleImageViewer/js/jquery.verySimpleImageViewer.js"></script>
<!--officeToHtml-->
<script src="assets/vendor/doc-viewer/include/officeToHtml/officeToHtml.js"></script>
<script src="assets/js/doc-viewer.js"></script>
<!-- app JavaScript -->
<script src="assets/js/app.js"></script>
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