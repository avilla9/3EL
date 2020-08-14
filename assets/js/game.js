$(document).ready(function () {

  $.get(
    "Tictactoe/getData",
    $(this).serialize(),
    function (data) {
    }
  );


  $.ajax({
    method: 'POST',
    url: base_url + 'Tictactoe/getData',
    data: {
      id_user: 1
    },
    success: function (data) {
      $("#player").html(data);
    },
    error: function (data) {
      console.log("error", data);
    }
  });
});