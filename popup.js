jQuery(document).ready(function ($) {
  var message = "";

  if ($("#publish").length) {
    $("#publish").on("click", function () {
      message = "Data created or updated!";
    });
  }

  if ($("#delete-action a").length) {
    $("#delete-action a").on("click", function () {
      message = "Data deleted!";
    });
  }

  $(window).on("beforeunload", function () {
    if (message !== "") {
      alert(message);
    }
  });
});
