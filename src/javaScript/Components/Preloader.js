import Component from "../Classes/Component"
import gsap from "gsap";

export default class Preloader extends Component {
    constructor () {
        super({
            element: '.pre_loader',
            elements: {
                texts: '.pl--title',
                lastText: '.last-pl--title',
                images: 'img',
                architecture : '.pl-text-b',
                space : '.pl-title-space',
                PLlogo : '.pl__logo-mark svg path',
                heroImg : '.full-width-hero img',
                heroTitles : '.full-width-hero .fw-title',
                heroButton : '.full-width-text-group .text-button',
                preloaderOne : '.pl-text-zone',
                preloaderTwo : '.pl__logo-mark',
                headerLine : '.logo_middle .homepage-line',
                headerButton : '.logo_middle .main-button',
                headerToggle : '.logo_middle .menu_toggle',
                headerLogo : ' .logo_middle .logo-container'
            }
        })

       this.init()


    } 

    init () {

        super.create()

        gsap.set([this.elements.texts, this.elements.lastText], {autoAlpha: 0, yPercent:-110 })
        gsap.set(this.elements.architecture, {yPercent:110})
        gsap.set([this.elements.space, this.elements.logo, this.elements.headerButton], {autoAlpha:0})
        gsap.set(this.elements.heroImg, { scale:1.2 })
        gsap.set( this.elements.heroTitles, {yPercent:110})
        gsap.set( [this.elements.headerButton, this.elements.headerToggle, this.elements.headerLogo], {autoAlpha:0})
        gsap.set(this.elements.heroButton, {yPercent:110, autoAlpha:0})
        gsap.set(this.elements.headerLine, { yPercent: 110, transformOrigin: 'bottom' })
    
        this.choosePreloader()
        this.animate()


    }

    choosePreloader() {
        this.tlPreloader = gsap.timeline({
            defaults: {
                ease: "power4.in",
                duration: 0.8,
                onStart: () => {
                    if (sessionStorage.showLoaderOne) {
                        this.elements.preloaderTwo.style.display = 'block'
                        this.elements.preloaderOne.style.display = 'none'
                    } else {
                        this.elements.preloaderTwo.style.display = 'none'
                        this.elements.preloaderOne.style.display = 'block'
                    }
                }
            }
        })
    }


    animate() {

        if (sessionStorage.showLoaderOne) {

            // second pre-loader
            this.tlPreloader
                .to(this.elements.PLlogo, { onComplete: () => {
                    this.elements.PLlogo.classList.add('svg-in');
                }})
                .to(this.element, { delay:0.4, autoAlpha:0, duration: 1.2, ease: 'power1.in'} )
                .to(this.elements.heroImg, { scale:1, duration:2, ease: "power4.out" }, "-=0.8" )
                .to( this.elements.headerLine,{ yPercent: 0, duration: 0.4, ease: "back.inOut(1.7)" }, '-=1')
                .to(this.elements.headerLogo, {autoAlpha:1, duration:0.4}, "-=0.4")
                .to([this.elements.headerToggle, this.elements.headerButton], {autoAlpha:1, duration:0.4}, '-=0.1')
                .to(this.elements.heroTitles, {yPercent:0, stagger: 0.1, duration:0.8, ease: 'power4.out'},'-=0.4')
                .to(this.elements.heroButton, {yPercent: 0, autoAlpha:1, duration:0.4}, '-=1')
        
        } else {
        
            this.tlPreloader
                .to(this.elements.texts, { autoAlpha: 1, yPercent: 0, stagger: 1, duration: 0.6, ease: "back.inOut(1.7)" })
                .to(this.elements.texts, { delay: 0.8, autoAlpha: 0, yPercent: 50, stagger: 1, duration:0.4, ease: 'power4.in' }, 0)
                .to(this.elements.space, {autoAlpha: 1, duration:0.6}, 0)
                .to(this.elements.lastText, { autoAlpha: 1, yPercent: 0, ease: "back.inOut(1.7)", duration:0.6 })
                .to(this.elements.architecture, { yPercent:0, ease: "back.inOut(1.7)" })
                .to(this.element, {delay: 0.2, yPercent:-110, duration: 1.2, ease: 'power1.in'})
                .to(this.elements.heroImg, { scale:1, duration:2, ease: "power4.out" }, "-=0.6" )
                .to( this.elements.headerLine,{ yPercent: 0, duration: 0.8, ease: "back.inOut(1.7)" }, '-=1.5')
                .to(this.elements.headerLogo, {autoAlpha:1}, "-=0.8")
                .to([this.elements.headerToggle, this.elements.headerButton], {autoAlpha:1}, '-=0.2')
                .to(this.elements.heroTitles, {yPercent:0, stagger: 0.1, duration:1.2, ease: 'power4.out'},'-=0.2')
                .to(this.elements.heroButton, {yPercent: 0, autoAlpha:1, onComplete: () => {
                    // remove preloader from dom
                // preloader.parentNode.removeChild(preloader);
                sessionStorage.setItem('showLoaderOne', true);
                }}, '-=2')    
        }


        this.tlPreloader.call(() => {
              //  this.emit('completed')
                this.destroy()
            }, null, '+=2')
           

    }

    destroy() {

        this.element.parentNode.removeChild(this.element);

    }






}