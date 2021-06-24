import each from 'lodash/each'

export default class Component {
    constructor({ element, elements, container}) {
        this.selector = element,
        this.items = {
            ...elements
        }

        this.scrollContainer = container

    }

    create () {
        // if selector has been selected dont select again
        this.selector instanceof window.HTMLElement ? this.element = this.selector : this.element = document.querySelector(this.selector)

        this.elements = {}

        each(this.items, (entry, key) => {

            if (entry instanceof window.HTMLElement || entry instanceof window.NodeList || Array.isArray(entry)) {
                this.elements[key] = entry
            } else {
                this.elements[key] = [...document.querySelectorAll(entry)]

                if (this.elements[key].length === 0) {
                    this.elements[key] = null
                } else if (this.elements[key].length === 1) {
                    this.elements[key] = document.querySelector(entry)
                }
            }
        })
    }

    addEventListeners() {}
    addRemoveListeners() {}
}