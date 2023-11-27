<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="row">
            <div class="col">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy;  mziity.corp 2023</span>
                </div>
            </div>
            <div class="col">
                <div class="copyright text-center my-auto">
                    <a href="https://www.instagram.com/mziity/">Created By: Taufik Putra</a>
                </div>
            </div>
        </div>

    </div>
</footer>

<script src="{{ asset('asset') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('asset') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('asset') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('asset') }}/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="{{ asset('asset') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('asset') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

 <!-- Page level plugins -->
 <script src="{{ asset('asset') }}/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('asset') }}/js/demo/chart-area-demo.js"></script>
<script src="{{ asset('asset') }}/js/demo/chart-pie-demo.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "scrollX": false
        });
        $('#dataTableRiwayatPerHari').DataTable({
            "scrollX": false
        });
    });
</script>

