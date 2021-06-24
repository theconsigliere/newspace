import Hero from "../../Classes/Hero";
import { gsap, DrawSVGPlugin, SplitText } from "gsap/all";
gsap.registerPlugin(DrawSVGPlugin, SplitText)

export default class Boxed extends Hero {
    constructor () {
        super({
            id: 'hero-boxed',
            heroClassname: '.hero-boxed',
            heroItems: {
                frame: '.hpf--svg svg path',
                subtitle: '.frame-subtitle',
                title: '.frame-title',
                image: '.hero-boxed img'
            }
        })

    }

    create (){
        super.create()

        this.title =  new SplitText(this.heroItems.title, {type: "lines", linesClass: "lineChild"});
        this.innerTitle =  new SplitText(this.heroItems.title, {type: "lines", linesClass: "lineParent"});
        this.subtitle =  new SplitText(this.heroItems.subtitle, {type: "lines", linesClass: "lineChild"});
        this.innerSubtitle =  new SplitText(this.heroItems.subtitle, {type: "lines", linesClass: "lineParent"});


        // hide all elements
        gsap.set(this.heroItems.frame, {drawSVG: "0%"})
        gsap.set([this.title.lines, this.subtitle.lines, ], { yPercent: 100})
        gsap.set(this.heroItems.image, { scale:1.2 })

        // split text

        
        this.init()
        this.onResize()
    }

    animate() {

        this.tlHero = gsap.timeline({
            defaults: {
                ease: "expo.out",
                duration: 0.8,
                }
        })
        // scale in image
        // draw frame
        // pop in subtitle then title


        this.tlHero
            .to(this.heroItems.image, {scale:1, duration:2, ease: "power4.out"})
            .to(this.heroItems.frame, {drawSVG: "100%"})
            .to([ this.subtitle.lines, this.title.lines,], { yPercent: 0, stagger: '0.3'})
        


    }

    onResize () {
        
    }


    init() {
        this.animate()
    }

}