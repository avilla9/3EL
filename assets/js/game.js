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
      id_user: user
    },
    success: function (data) {
      $("#player").html(data);
    },
    error: function (data) {
      console.log("error", data);
    }
  });
});