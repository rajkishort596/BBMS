$(document).ready(function () {
  $("#upload-pic").on("click", (event) => {
    event.preventDefault();

    let form_data = new FormData();
    let img = $("#profilePic")[0].files;
    // Check image selected or not
    if (img.length > 0) {
      form_data.append(`profilePic`, img[0]);
      $.ajax({
        url: "../../controllers/UpdateProfilePic.php",
        type: "POST",
        data: form_data,
        contentType: false,
        processData: false,
        success: function (res) {
          const data = JSON.parse(res);
          if (data.error == 0) {
            msg = "<div class='Empty'>Image uploaded sucessfully.</div>";
            $(".msg").html(msg); // Show the message in .msg element
          } else {
            $(".msg").text(data.errorMsg);
          }
          // Remove the message after 3 seconds
          setTimeout(function () {
            $(".msg").html("");
          }, 3000);
        },
      });
    } else {
      let msg;
      msg = "<div class='Empty'>Please select an image.</div>";
      $(".msg").html(msg); // Show the message in .msg element
    }
  });
});
