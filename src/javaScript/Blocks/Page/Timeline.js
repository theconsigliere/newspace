import Block from "../../Classes/Block";
import { gsap, ScrollTrigger } from "gsap/all";
gsap.registerPlugin(ScrollTrigger)
import { halfHeight, getVh } from '../../Utils/Height'

export default class Timeline extends Block {
    constructor () {

        super({
            id: 'timeline',
            blockClassname: '.timeline',
            blockItems: {
                steps: '.scroll-tab',
                stages: '.ck-stage'
            }
        })
    }

    create ({ scroll, container}) {
        console.log('hello')
        super.create()
        this.init()

        this.scroll = scroll
        this.container = container

    }

    pin () {

        // pin scroll-box
        ScrollTrigger.create({
        trigger: this.blockItems.steps,
        start: "top center",
        endTrigger: this.blockItems.stages[this.blockItems.stages.length - 1],
        end: "bottom bottom",
        pin: true,
        marker: true

    })

    }

    animateStages () {

        this.blockItems.stages.forEach((stage, index) => {
            const links = [...this.blockItems.steps.querySelectorAll('.scroll--menu_item')]
            const color = links[index].getAttribute('data-color')
            const title = stage.querySelector('.case__title')
            const desc = stage.querySelector('.case__desc')
            const circle = links[index].querySelector('.inner-circle')

            let newIndex
          
            if (index === 0) {
              newIndex = -1
            } else if (index > 0) {
              newIndex = index - 1
            }

            let tl = gsap.timeline()

            gsap.set(title, { autoAlpha: 0, yPercent: 105})
            gsap.set(desc, { autoAlpha: 0, yPercent: 20})

            tl
                .to(title, { autoAlpha: 1, yPercent: 0, duration: 1, ease: "Power4.easeOut.easeOut", }, 0)
                .to(desc, { autoAlpha: 1, yPercent: 0, duration: 1, ease: "Power4.easeOut.easeOut", }, 0.2)
                .to(circle, { backgroundColor: color, width: '50%', height: '50%', duration: 0.2 }, 0)

            if (newIndex >= 0) {
              const pipe = links[newIndex].querySelector('.inner-pipe')
              tl.to(pipe, {backgroundColor: color, height: '100%', duration: 0.2 }, 0)
            }



           // console.log('link colour is' + color)

            //add active class
            ScrollTrigger.create({
                trigger: stage,
                start: 'top center',
                animation: tl,
                end: () =>`+=${stage.clientHeight+ getVh() / 10}`,
             //   end: () =>`+=${lastStage.clientHeight / 2}`,
              //  markers: true,
                toggleClass: {
                    targets: links[index],
                    className: "js-tab-visible",
                }
            })

            // when we click on a link scroll to that section

            links.forEach(link => {
        
                const target = link.getAttribute('href');
              
        
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    // use loco scroll to scroll to section

                    this.scroll.scroll.scrollTo(target, {offset: -halfHeight(stage)})
                });
        
            });
            
        })

    }

    init() {
        this.pin()
        this.animateStages()
    }


}