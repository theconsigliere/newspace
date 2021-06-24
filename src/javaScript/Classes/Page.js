import each from 'lodash/each'


export default class Page {
    constructor ({pageName, items}) {
        this.selector = pageName
        this.items = {
            ...items
        }
        this.container = document.querySelector('.locomotive-scroll-container')       
    } 

    create () {

        this.element = document.querySelector(this.selector)

        this.pageItems = {}

        each(this.items, (entry, key) => {
            if (entry instanceof window.HTMLElement || entry instanceof window.NodeList || Array.isArray(entry)) {
                this.pageItems[key] = entry
            } else {
                this.pageItems[key] = [...document.querySelectorAll(entry)]

                if (this.pageItems[key].length === 0) {
                    this.pageItems[key] = null
                } else if (this.pageItems[key].length === 1) {
                    this.pageItems[key] = document.querySelector(entry)
                }
            }
        })
    }


}