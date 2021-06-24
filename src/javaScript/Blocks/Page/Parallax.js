import Block from "../../Classes/Block";
import { gsap, ScrollTrigger } from "gsap/all";
gsap.registerPlugin(ScrollTrigger)


export default class Parallax extends Block {
    constructor () {

        super({
            id: 'ns-parallax',
            blockClassname: '.ns-parallax',
            blockItems: {
                images: '.with-parallax img'
            }
        })
    }

    create ({ scroll, container}) {
        super.create()


        this.scroll = scroll
        this.container = container

        this.init()
        this.onResize()

    }

    fix() {

        gsap.to(this.blockItems.images, { 
            yPercent: 40,
            ease: "none",
            scale: 1.2,
          
            scrollTrigger: {
              trigger: this.blockClassname,
              start: "top center+=20%",
              end: "bottom top",
              scrub: true
            }
          })

    }

        onResize () { }
  


    init() {
        this.fix()


        }
}