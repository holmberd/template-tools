function initModal(num) {
    // Get the images and insert them inside the modal.
    var gameImage = null;
    var gameModalImage = null;
    var gameId = '';

    for (var i = 1; i <= num; i++) {
        gameId = '#app-screenshot-' + i.toString();
        gameImage = document.querySelector(gameId);
        gameModalImage = document.querySelector('#app-modal-image');
        gameImage.onclick = function() {
            gameModal.style.display = 'block';
            gameModalImage.src = this.src;
        }
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("app-modal-close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        gameModal.style.display = "none";
    }
}
// Get the game modal
var gameModal = document.getElementById('app-images-modal');

// Get number of images in the list.
var gameImages = document.querySelector('.slides');
if (gameImages) {
    var imageList = gameImages.querySelectorAll('li');
    initModal(imageList.length);
}
