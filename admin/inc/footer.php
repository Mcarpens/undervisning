<footer class="sticky-footer">
    <div class="container">
        <div class="text-center">
            <small>Copyright © <?php foreach ($setting->getAllSettings() as $settings) {echo $settings->site_name;} ?>, <?= date('Y') ?></small>
            <p><?php
                echo 'Request Time: ' . $page_time = round(microtime(true)-$_SERVER['REQUEST_TIME'], 3) . ' ms';
                ?></p>
        </div>
    </div>
</footer>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
</a>

<!-- Opdater Modal-->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Klar til at opdatere siden?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Er du parat til at opdatere hele siden?</div>
            <progress id="progressBar" value="0" max="100" style="width: 100%;"></progress>
            <span id="status"></span>
            <p id="finalMessage"></p>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Fortryd</button>
                <a class="btn btn-primary" data-label="do it!" onclick='start(0)' href="../index.php?side=opdater">Opdater</a>
            </div>
        </div>
    </div>
</div>
<!-- Logout Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Klar til at forlade siden?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Logud for at forlade siden, samt for at rydde din session.</div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Fortryd</button>
                <a class="btn btn-primary" href="./index.php?side=logud">Log ud</a>
            </div>
        </div>
    </div>
</div>

<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="./assets/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="./assets/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="./assets/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="./assets/bower_components/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="./assets/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="./assets/bower_components/modernizr/js/modernizr.js"></script>
<script type="text/javascript" src="./assets/bower_components/modernizr/js/css-scrollbars.js"></script>
<!-- am chart -->
<script src="./assets/pages/widget/amchart/amcharts.min.js"></script>
<script src="./assets/pages/widget/amchart/serial.min.js"></script>
<!-- Chart js -->
<script type="text/javascript" src="./assets/bower_components/chart.js/js/Chart.js"></script>
<!-- Todo js -->
<script type="text/javascript" src="./assets/pages/todo/todo.js "></script>
<!-- data-table js -->
<script src="./assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="./assets/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="./assets/pages/data-table/js/jszip.min.js"></script>
<script src="./assets/pages/data-table/js/pdfmake.min.js"></script>
<script src="./assets/pages/data-table/js/vfs_fonts.js"></script>
<script src="./assets/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="./assets/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="./assets/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./assets/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="./assets/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="./assets/pages/data-table/js/data-table-custom.js"></script>

<!-- jquery file upload js -->
<script src="./assets/pages/jquery.filer/js/jquery.filer.min.js"></script>
<script src="./assets/pages/filer/custom-filer.js" type="text/javascript"></script>
<script src="./assets/pages/filer/jquery.fileuploads.init.js" type="text/javascript"></script>

<!-- notification js -->
<script type="text/javascript" src="./assets/js/bootstrap-growl.min.js"></script>
<script type="text/javascript" src="./assets/pages/notification/notification.js"></script>

<!-- chat js -->
<script type="text/javascript" src="./assets/pages/chat/js/mmc-common.js"></script>
<script type="text/javascript" src="./assets/pages/chat/js/mmc-chat.js"></script>
<script type="text/javascript" src="./assets/pages/chat/js/chat.js"></script>

<!-- i18next.min.js -->
<script type="text/javascript" src="./assets/bower_components/i18next/js/i18next.min.js"></script>
<script type="text/javascript" src="./assets/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="./assets/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="./assets/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="./assets/pages/dashboard/custom-dashboard.min.js"></script>
<script type="text/javascript" src="./assets/js/SmoothScroll.js"></script>
<script src="./assets/js/pcoded.min.js"></script>
<script src="./assets/js/demo-12.js"></script>
<script src="./assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="./assets/js/script.min.js"></script>

<script src="./assets/js/tinymce/tinymce.min.js"></script>

<script>
    function start(al) {
        var bar = document.getElementById('progressBar');
        var status = document.getElementById('status');
        status.innerHTML = al + "%";
        bar.value = al;
        al++;
        var sim = setTimeout("start(" + al + ")", 1);
        if (al == 100) {
            status.innerHTML = "100%";
            bar.value = 100;
            clearTimeout(sim);
            var finalMessage = document.getElementById('finalMessage');
            finalMessage.innerHTML = "Opdateringen er gennemført!";
        }
    }
</script>

<script>
    tinymce.init({
        selector: '#mytextarea'
    });
    tinymce.init({
        selector: '#mytextarea1'
    });
    tinymce.init({
        selector: '#mytextarea2'
    });
    tinymce.init({
        selector: '#mytextarea3'
    });
    tinymce.init({
        selector: '#mytextarea4'
    });

    $('.selectpicker').selectpicker({
        style: 'btn-info',
        size: 4
    });

</script>

<script>
    // Prevent Bootstrap dialog from blocking focusin
    $(document).on('focusin', function(e) {
        if ($(e.target).closest(".mce-window").length) {
            e.stopImmediatePropagation();
        }
    });
</script>
</div>
</body>

</html>