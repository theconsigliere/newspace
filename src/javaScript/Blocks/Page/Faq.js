import Block from "../../Classes/Block";
import { gsap, ScrollTrigger } from "gsap/all";
gsap.registerPlugin(ScrollTrigger)
import Scroll from "../../Components/Scroll";
import { halfHeight } from '../../Utils/Height'

export default class FAQ extends Block {
    constructor () {

        super({
            id: 'faq-block',
            blockClassname: '.ns-faq',
            blockItems: {
                menu: '.ns-faq-main-nav',
                answers: '.faq-qa-inner',
                innerBar: '.ns-nav-faqs',
                questions: '.faq-sm-link',
                topLevel: '.top-level details',
                stages: '.faq-qa-item'
            }
        })
    }

    create ({ scroll, container}) {
        super.create()
        this.init()

        this.scroll = scroll
        this.container = container

    }

    linkTo () {


    //    console.log(this.scroll.scroll)

        this.blockItems.stages.forEach( stage => {
  
            // when we click on a link scroll to that section
            this.blockItems.questions.forEach(link => {
                const target = link.getAttribute('href')
                
                link.addEventListener('click', (e) => {
                    e.preventDefault()

                
                    this.scroll.scroll.scrollTo(target, {offset: -halfHeight(stage)})
                });
        
            });
  
        })
  
  
  
    }

    collapse() {

        // close all tabs when opening a new tab
             // Add the onclick listeners.
             this.blockItems.topLevel.forEach((targetDetail) => {
                 targetDetail.addEventListener("click", () => {
                 // Close all the details that are not targetDetail.
                 this.blockItems.topLevel.forEach((detail) => {
                     if (detail !== targetDetail) {
                     detail.removeAttribute("open")
                     }
                 });
                 });
             });
       
         }


    fixInPlace () {

       // console.log(this.container.container)
        // pin scroll-box
        ScrollTrigger.create({
            trigger: this.blockItems.menu,
            start: "top top+=10%",
            endTrigger: this.blockItems.stages[this.blockItems.stages.length - 1],
            end: "center center",
            pin: true,
         //   markers: true
    })

}



  init () {

  this.fixInPlace()
  this.collapse()
  this.linkTo()



}


}

