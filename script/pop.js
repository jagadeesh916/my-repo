
  window.onload = function() {
    var modal = document.getElementById("popupPoster");
    var closeBtn = document.getElementsByClassName("close-btn")[0];

    // Display the modal
    modal.style.display = "block";

    // When the user clicks on the close button, close the modal
    closeBtn.onclick = function() {
      modal.style.display = "none";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    };
  };
