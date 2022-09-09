import { Controller } from "@hotwired/stimulus";

export default class extends Controller {

    static targets = ['icon', 'tooltip'];

    manageFavorite (event) {
        event.preventDefault();

        if (this.iconTarget.classList.contains('favorite_add')) {
            this.iconTarget.classList.replace('favorite_add', 'favorite_remove');
            console.log('Hobby added in your favorites!');
        }
        else if (this.iconTarget.classList.contains('favorite_remove')) {
            this.iconTarget.classList.replace('favorite_remove', 'favorite_add');
            console.log('Hobby removed from your favorites!');
        }
        else {
            console.log('No hobby to add and remove(?)');
        }

        return fetch(this.element.action, {
            method: this.element.method,
            body: new URLSearchParams(new FormData(this.element)),
        });
    }

    notConnected () {
        if (this.tooltipTarget.style.visibility == 'visible') {
            this.tooltipTarget.style.visibility = 'hidden';
        }
        else {
            this.tooltipTarget.style.visibility = 'visible';
        }
    }
}