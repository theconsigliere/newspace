const imageSections = document.querySelectorAll('.image-sections__js')

// media query event handler
if (matchMedia) {

    const mq = window.matchMedia("(max-width: 992px)");
    mq.addListener(WidthChange);
    WidthChange(mq);
}

// media query change
function WidthChange(mq) {
    if (mq.matches) {
        imageSections.forEach(imageGroup => {

            // if image__item is the first child in the div, add class so on mobile view image is shown at the top
            if (imageGroup.children[0].classList.contains('image__item')) {
                imageGroup.classList.add('column-reverse')
            }
        })
    } else {
        imageSections.forEach(imageGroup => {

            // if image__item is the first child in the div, add class so on mobile view image is shown at the top
            if (imageGroup.children[0].classList.contains('image__item')) {
                imageGroup.classList.remove('column-reverse')
            }
        })
    }
    

}