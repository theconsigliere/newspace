function Gallery(gallery) {

    if (!gallery) {
      throw new Error('No Gallery Found!');
    }
    
    // select the elements we need
    const galleryInner = gallery.querySelector('.js-gallery')
    const images = Array.from(gallery.querySelectorAll('img'));
    const modal = gallery.querySelector('.gallery-modal');
    const prevButton = modal.querySelector('.prev');
    const nextButton = modal.querySelector('.next');
    let currentImage;
  
    function openModal() {
      // console.info('Opening Modal...');
      // First check if the modal is already open
      if (modal.matches('.open')) {
      //  console.info('Modal already open');
        return; // stop the function from running
      }
      modal.classList.add('open');
  
      // Event listeners to be bound when we open the modal:
      window.addEventListener('keyup', handleKeyUp);
      nextButton.addEventListener('click', showNextImage);
      prevButton.addEventListener('click', showPrevImage);
    }
  
    function closeModal() {
      modal.classList.remove('open');
      // TODO: add event listeners for clicks and keyboard..
      window.removeEventListener('keyup', handleKeyUp);
      nextButton.removeEventListener('click', showNextImage);
      prevButton.removeEventListener('click', showPrevImage);
    }
  
    function handleClickOutside(e) {
      if (e.target === e.currentTarget) {
        closeModal();
      }
    }
  
    function handleKeyUp(event) {
      if (event.key === 'Escape') return closeModal();
      if (event.key === 'ArrowRight') return showNextImage();
      if (event.key === 'ArrowLeft') return showPrevImage();
    }
  
    function showNextImage() {
      showImage(currentImage.nextElementSibling || galleryInner.firstElementChild);
    }
    function showPrevImage() {
      showImage(currentImage.previousElementSibling || galleryInner.lastElementChild);
    }
  
    function showImage(el) {
      if (!el) {
      //  console.info('no image to show');
        return;
      }
      // update the modal with this info

      modal.querySelector('img').src = el.src;
      modal.querySelector('h2').textContent = el.title;
      modal.querySelector('figure p').textContent = el.dataset.description;
      currentImage = el;
      openModal();
    }
  
    // These are our Event Listeners!
    images.forEach(image =>
      image.addEventListener('click', e => showImage(e.currentTarget))
    );
  
    // loop over each image
    images.forEach(image => {
      // attach an event listener for each image
      image.addEventListener('keyup', e => {
        // when that is keyup'd, check if it was enter
        if (e.key === 'Enter') {
          // if it was, show that image
          showImage(e.currentTarget);
        }
      });
    });
  
    modal.addEventListener('click', handleClickOutside);
  }
  
  // Use it on the page

  window.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.gallery__section').forEach( (galleryBlock) => {
      Gallery( galleryBlock )
    })
});



