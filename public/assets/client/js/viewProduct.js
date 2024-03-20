document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.querySelector('.toggle-menu');
    const drawer = document.querySelector('.drawer');
    const drawerOverlay = document.querySelector('.drawer-overlay');
  
    toggleButton.addEventListener('click', function() {
      drawer.classList.toggle('open');
    });
  
    const closeButton = document.querySelector('.btn-close');
    closeButton.addEventListener('click', function() {
      drawer.classList.remove('open');
    });
  });

  
  
  document.addEventListener('DOMContentLoaded', function() {
    const favToggle = document.getElementById('fav-toggle');

    favToggle.addEventListener('click', function() {
        const favButton = document.querySelector('#fav-toggle');
        favButton.classList.toggle('fav-icon-clicked');
    });
});
// for review section
document.addEventListener('DOMContentLoaded', function() {
  document.querySelector('.reviewBtn').addEventListener('click', function() {
      var reviewBox = document.querySelector('.reviewBox');
      reviewBox.classList.toggle('reviewBoxHidden');
      reviewBox.classList.toggle('reviewBoxVisible');
  });
});

// js for popup
document.addEventListener('DOMContentLoaded', function() {
  var openPopupBtn = document.getElementById('openPopupBtn');
  var closePopupBtn = document.getElementById('closePopupBtn');
  var popup = document.getElementById('reviewPopup');

  openPopupBtn.addEventListener('click', function() {
      popup.style.display = 'block';
  });

  closePopupBtn.addEventListener('click', function() {
      popup.style.display = 'none';
  });
});
