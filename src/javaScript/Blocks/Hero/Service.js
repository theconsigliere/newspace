import Hero from "../../Classes/Hero";
import { gsap, DrawSVGPlugin, SplitText } from "gsap/all";
gsap.registerPlugin(DrawSVGPlugin, SplitText)

export default class Service extends Hero {
    constructor () {
        super({
            id: 'hero-service',
            heroClassname: '.hero-service',
            heroItems: {
                logo: '.hero__service__symbol svg path',
                subtitle: '.hero__service__subtitle',
                title: '.hero__service__title',
                pipe: '.hs-line-bottom-inner ',
                image: '.hero-service img'
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
        gsap.set(this.heroItems.logo, {drawSVG: "0%"})
        gsap.set([this.title.lines, this.subtitle.lines, this.heroItems.pipe], { yPercent: 100})
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
        // draw logo
        // pop in subtitle then title


        this.tlHero
            .to(this.heroItems.image, {scale:1, duration:2, ease: "power4.out"})
            .to(this.heroItems.logo, {drawSVG: "100%"})
            .to([ this.subtitle.lines, this.title.lines,], { yPercent: 0, stagger: '0.3'})
            .to(this.heroItems.pipe, { yPercent: 0, duration: 0.4 })
        


    }

    onResize () {
        
    }


    init() {
       this.animate()
    }

}