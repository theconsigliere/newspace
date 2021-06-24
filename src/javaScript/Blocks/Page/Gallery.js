import Block from "../../Classes/Block";
import { gsap, ScrollTrigger, DrawSVGPlugin, SplitText } from "gsap/all";
gsap.registerPlugin(ScrollTrigger, DrawSVGPlugin, SplitText)


export default class Gallery extends Block {
    constructor () {

        super({
            id: 'ns-gallery-slider',
            blockClassname: '.ns-gallery-slider',
            blockItems: {
                pin: '.gallery-slider-parent',
                slides: '.ns--gallery--slider--item'
            }
        })
    }

    create ({ scroll, container}) {
        super.create()


        this.scroll = scroll
        this.container = container


        gsap.set(this.blockItems.pin, {width: '150vw'})
     //   gsap.set(this.blockItems.slides, {autoAlpha: 0})

        this.init()
        this.onResize()

    }

    fix() {

        // FADE IMAGES IN

        // gsap.to(this.blockItems.slides, { 
        //     autoAlpha: 1,
        //     duration: 0.4,
        //     ease: 'expo.out',
        //     stagger: 0.2,
        //     scrollTrigger: { 
        //         trigger: this.blockItems.pin, 
        //        // markers: true,
        //         start: 'top center'
        //     }
        
        // })



        // MOVE SLIDER

        gsap.to(this.blockItems.pin, { 
            x: -(this.blockItems.pin.scrollWidth * 0.70),
            scrollTrigger: { 
                trigger: this.blockItems.pin, 
                scrub: 0.5 ,
              //  markers: true,
                start: 'center center',
                end: 'bottom top',
            }
        
        })


    }



        onResize () {
        
        }
  


    init() {
        this.fix()


      // FOR EACH SLIDE    
      // Logo fade in, line in, on scroll logo fade out and line in   
      //  first slide text, description and button fade in 
    }

}