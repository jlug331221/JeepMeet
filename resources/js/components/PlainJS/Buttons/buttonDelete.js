document.addEventListener("DOMContentLoaded", function() {
  let deleteButton = document.querySelector('.handle-delete-of-button');

  if(deleteButton !== null) {
    deleteButton.addEventListener('click', function(event) {
      document.querySelector('.is-danger').style.visibility = 'hidden';
    });
  }
});