import each from 'lodash/each'


export default class Block {
    constructor ({ blockID, blockClassname, blockItems}) {
        this.id = blockID
        this.selector = blockClassname
        this.items = {
            ...blockItems
        }
        this.container = document.querySelector('.locomotive-scroll-container')
       
    } 


    create () {

        this.element = document.querySelector(this.selector)

        this.blockItems = {}


        each(this.items, (entry, index) => {

            if (entry instanceof window.HTMLElement || entry instanceof window.NodeList || Array.isArray(entry)) {
                this.blockItems[index] = entry
            } else {
                this.blockItems[index] = [...document.querySelectorAll(entry)]

                if (this.blockItems[index].length === 0) {
                    this.blockItems[index] = null
                } else if (this.blockItems[index].length === 1) {
                    this.blockItems[index] = document.querySelector(entry)
                }
            }
        })

     

    }

   // does block need to enable gutenberg  back end editing
    enableGutenberg () {

        
    }

    onResize () {
        
    }
}