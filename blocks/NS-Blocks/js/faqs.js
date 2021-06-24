// TODO! Collapse all FAQ'S when clicking on new top-link
class FAQmenu {

    constructor (options) {
        this.faqBar = options.menu
        this.faqAnswers = options.answers
        this.innerFaqBar = this.faqBar.querySelector('.ns-nav-faqs')
        this.faqQuestions = [...this.innerFaqBar.querySelectorAll('.faq-sm-link')]
        this.faqTopLevel = [...this.innerFaqBar.querySelectorAll('.top-level details')]
        this.stages = [...this.faqAnswers.querySelectorAll('.faq-qa-item')]
        this.lastStage = this.stages.length - 1



        // init menu
        this.init()

    }

    linkTo () {


        this.stages.forEach( stage => {

            // when we click on a link scroll to that section

            this.faqQuestions.forEach(link => {

                const target = link.getAttribute('href');
                
        
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    // use loco scroll to scroll to section
    
                    locoScroll.scrollTo(target, {offset: -halfHeight(stage)})
                });
        
            });

        })



    }

    collapse() {

   // close all tabs when opening a new tab

        // Add the onclick listeners.
        this.faqTopLevel.forEach((targetDetail) => {
            targetDetail.addEventListener("click", () => {
            // Close all the details that are not targetDetail.
            this.faqTopLevel.forEach((detail) => {
                if (detail !== targetDetail) {
                detail.removeAttribute("open");
                }
            });
            });
        });

    }

    fixInPlace () {

            // pin scroll-box
            ScrollTrigger.create({
            trigger: this.faqBar,
            start: "top top+=10%",
            endTrigger: this.stages[this.lastStage],
            end: "center center",
            scroller: scrollContainer,
            pin: true

        })

    }



    init () {

        this.fixInPlace()

        this.collapse()

        this.linkTo()



    }


}

