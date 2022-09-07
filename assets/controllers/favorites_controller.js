import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
    static targets = ['icon'];

    manageFavorite () {
        if (this.iconTarget.classList.contains('favorite_add')) {
            this.iconTarget.classList.replace('favorite_add', 'favorite_remove');
            console.log('Hobby added in your favorites!');

            this.element.submit();

            return fetch(this.element.action, {
                method: this.element.method,
                body: new URLSearchParams(new FormData(this.element)),
            });

        }
        else if (this.iconTarget.classList.contains('favorite_remove')) {
            this.iconTarget.classList.replace('favorite_remove', 'favorite_add');
            console.log('Hobby removed from your favorites!');

            this.element.submit();

            return fetch(this.element.action, {
                method: this.element.method,
                body: new URLSearchParams(new FormData(this.element)),
            });
        }
        else {
            console.log('No hobby to add and remove(?)');
        }
    }
}