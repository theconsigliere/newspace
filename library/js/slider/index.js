
// Homepage Slider

const homeSlider = document.querySelectorAll('.ns-slider__section')

homeSlider.forEach(section => {

    const home = new Slider( section );
    home.init();

})

