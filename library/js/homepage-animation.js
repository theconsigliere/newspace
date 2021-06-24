gsap.registerPlugin(ScrollTrigger)

const preloader = document.querySelector('.pre_loader')

// First Preloader

if (preloader) {

     // preloader

    const preloaderText = document.querySelectorAll('.pl--title')
    const lastText = document.querySelector('.last-pl--title')
    const architecture = document.querySelector('.pl-text-b')
    const space = document.querySelector('.pl-title-space')
    const PLlogo = document.querySelector('.pl__logo-mark #ns-path')

    // hero
    const fullWidthHero = document.querySelector('.full-width-hero')
    const fullwidthImg = fullWidthHero.querySelector('img')
    const heroTitles = fullWidthHero.querySelectorAll('.fw-title')
    const button = fullWidthHero.querySelector('.text-button')

    // preloaders
    const preloaderOne = document.querySelector('.pl-text-zone')
    const preloaderTwo = document.querySelector('.pl__logo-mark')


    // header
    const header = document.querySelector('.logo_middle')
    const line = header.querySelector('.homepage-line')
    const headerButton = header.querySelector('.main-button')
    const toggle = header.querySelector('.menu_toggle')
    const logo = header.querySelector('.logo-container')
   // const logoTitle = header.querySelector('g#Group_56')

 
   
  //  gsap.set(PLlogo, {autoAlpha:0})
    gsap.set([preloaderText,lastText], {autoAlpha: 0, yPercent:-110 })
    gsap.set(architecture, {yPercent:110})
    gsap.set([space, logo, headerButton, toggle], {autoAlpha:0})
    gsap.set(fullwidthImg, { scale:1.2 })
    gsap.set( heroTitles, {yPercent:110})
    gsap.set(button, {yPercent:110, autoAlpha:0})
    gsap.set(line, { yPercent: 110, transformOrigin: 'bottom' })

    let timeline = gsap.timeline({
        defaults: {
            ease: "power4.in",
            duration: 0.8,
            onStart: () => {
                if (sessionStorage.showLoaderOne) {
                    preloaderTwo.style.display = 'block'
                    preloaderOne.style.display = 'none'
                } else {
                    preloaderTwo.style.display = 'none'
                    preloaderOne.style.display = 'block'
                }
            }
        }
    })

    // Loop through every pre loader text and pop them up individually


    // Local Storage after the session ends run full preloader again



if (sessionStorage.showLoaderOne) {


    // second pre-loader
    timeline
        .to(PLlogo, { onComplete: () => {
            PLlogo.classList.add('svg-in');
        }})
        .to(preloader, { delay:0.4, autoAlpha:0, duration: 1.2, ease: 'power1.in'} )
        .to(fullwidthImg, { scale:1, duration:2, ease: "power4.out" }, "-=0.8" )
        .to( line,{ yPercent: 0, duration: 0.4, ease: "back.inOut(1.7)" }, '-=1')
        .to(logo, {autoAlpha:1, duration:0.4}, "-=0.4")
        .to([toggle, headerButton], {autoAlpha:1, duration:0.4}, '-=0.1')
        .to(heroTitles, {yPercent:0, stagger: 0.1, duration:0.8, ease: 'power4.out'},'-=0.4')
        .to(button, {yPercent: 0, autoAlpha:1, duration:0.4, onComplete: () => {
            // remove preloader from dom
           // preloader.parentNode.removeChild(preloader);
        }}, '-=2')




} else {


    // first loader
    timeline
    .to(preloaderText, { autoAlpha: 1, yPercent: 0, stagger: 1, duration: 0.6, ease: "back.inOut(1.7)" })
    .to(preloaderText, { delay: 0.8, autoAlpha: 0, yPercent: 50, stagger: 1, duration:0.4, ease: 'power4.in' }, 0)
    .to(space, {autoAlpha: 1, duration:0.6}, 0)
    .to(lastText, { autoAlpha: 1, yPercent: 0, ease: "back.inOut(1.7)", duration:0.6 })
    .to(architecture, { yPercent:0, ease: "back.inOut(1.7)" })
    .to(preloader, {delay: 0.2, yPercent:-110, duration: 1.2, ease: 'power1.in'})
    .to(fullwidthImg, { scale:1, duration:2, ease: "power4.out" }, "-=0.6" )
    .to( line,{ yPercent: 0, duration: 0.8, ease: "back.inOut(1.7)" }, '-=1.5')
    .to(logo, {autoAlpha:1}, "-=0.8")
    .to([toggle, headerButton], {autoAlpha:1}, '-=0.2')
    .to(heroTitles, {yPercent:0, stagger: 0.1, duration:1.2, ease: 'power4.out'},'-=0.2')
    .to(button, {yPercent: 0, autoAlpha:1, onComplete: () => {
        // remove preloader from dom
      // preloader.parentNode.removeChild(preloader);
      sessionStorage.setItem('showLoaderOne', true);
    }}, '-=2')

}



   




}