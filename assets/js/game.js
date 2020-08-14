/* $(document).ready(function () {

  $.get(
    "Tictactoe/getForm",
    $(this).serialize(),
    function (data) {
      if (data == 1) {
        url = "<?php echo base_url(); ?>tictactoe/index/0";
        $(location).attr("href", url);
      } else {
        swal("Error al iniciar sesión", "Error desconocido", "warning");
      }
    }
  );
}); */