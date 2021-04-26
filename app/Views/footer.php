<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Real Estate <?= date('Y') ?></div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
    <script src="<?= base_url() . '/public/' ?>js/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url() . '/public/' ?>js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url() . '/public/' ?>js/scripts.js"></script>
    <script src="<?= base_url() . '/public/' ?>js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url() . '/public/' ?>js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url() . '/public/' ?>assets/demo/datatables-demo.js"></script>
    <script>
        $('#modal-confirma').on('show.bs.modal', function(e){
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    </script>
</body>
</html>
