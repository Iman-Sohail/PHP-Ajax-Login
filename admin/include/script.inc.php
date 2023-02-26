<!-- Bootstrap Script -->
<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Fontawesome Script -->
<script src="../assets/fontawesome/js/all.min.js"></script>
<!-- Sweel Alert Script -->
<script src="../assets/sweet_alert/js/sweetalert2.all.min.js"></script>
<!-- Jquery Script -->
<script src="../assets/jquery/jquery-3.6.3.min.js"></script>
<!-- Javascript Script -->
<script src="../assets/js/script.js"></script>
<script>
    $(document).on('click','#logoutBtn',function(){

        $.ajax({
            url: './ajax/logout.ajax.php',
            type: 'POST',
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');
                
                if (token) {
                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            },
            success: function (response) {

                if (response == "logout success") {
                    window.location.assign('../login');
                }

            },
            error: function (result) {
                Swal.fire({
                    icon: "error",
                    title: "Some Error",
                });
                return false;                
            }
        });

    });
</script>