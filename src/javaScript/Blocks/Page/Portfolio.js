import Block from "../../Classes/Block";
import { gsap, ScrollTrigger, DrawSVGPlugin, SplitText } from "gsap/all";
gsap.registerPlugin( ScrollTrigger, DrawSVGPlugin, SplitText)


export default class PortfolioBlock extends Block {
    constructor () {
        super({
            id: 'block__portfolio',
            blockClassname: '.block__portfolio',
            blockItems: {
                pin: '.portfolio__text__group',
                title: '.b-portfolio__title',
                subtitle: '.b-portfolio__subtitle',
                button: '.b-portfolio__button',
                logo: '.portfolio__box-right svg path'
            }
        })

        
    }

    create ({ scroll, container}) {
        super.create()

      //  this.titles = new SplitText(this.blockItems.titles, {type:"words"})
      //  this.descs = new SplitText(this.blockItems.descs, {type:"words"})

     

        this.scroll = scroll
        this.container = container


        console.log(this.blockItems)

        this.title =  new SplitText(this.blockItems.title, {type: "lines", linesClass: "lineChild"});
        this.innerTitle =  new SplitText(this.blockItems.title, {type: "lines", linesClass: "lineParent"});
        this.subtitle =  new SplitText(this.blockItems.subtitle, {type: "lines", linesClass: "lineChild"});
        this.innerSubtitle =  new SplitText(this.blockItems.subtitle, {type: "lines", linesClass: "lineParent"});
        
        
        gsap.set(this.blockItems.logo, { drawSVG: "0%"})
        gsap.set(this.blockItems.button, { autoAlpha: 0})
        gsap.set(['.b-portfolio__title .lineChild', '.b-portfolio__subtitle .lineChild'], { yPercent: 100})
        //

      //  gsap.set(this.blockItems.images, {autoAlpha: 0, scale: 1.2})

 this.init()
      this.onResize()

    }


    animateIn() {

    
            this.animationIn = gsap.timeline({
                defaults: {
                    duration: 0.6,
                    ease: 'expo.out'
                },
                // add scrolltrigger to timelinex
                scrollTrigger:{
                    trigger: this.blockItems.pin,
                    start:"center bottom",
                    end:"bottom bottom",
                    toggleActions:"play pause restart reset",
                    // markers: true,
                    scrub: true
                }

            })


            this.animationIn
                .to(['.b-portfolio__subtitle .lineChild', '.b-portfolio__title .lineChild', ], { yPercent: 0, stagger: '0.2'})
                .to(this.blockItems.logo, { drawSVG: "100%", duration: 1.5, ease: 'none' }, '-=0.6')
                .to(this.blockItems.button, {autoAlpha: 1} , '-=1.5')
           
            //    .to([this.titles.words, this.descs.words], {autoAlpha: 1, stagger: 0.1, yPercent: '0%'})
 
    }



 

        onResize() {

        }
  


    init() {
      
  
        this.animateIn()
    


    }

}