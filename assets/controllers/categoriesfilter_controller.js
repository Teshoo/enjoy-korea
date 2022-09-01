import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
    static targets = ['filter', 'category'];

    categories_filter() {
        let category, txtValue, string, input;

        input = this.filterTarget;
        string = input.value.toUpperCase();

        for (let i=0; i < this.categoryTargets.length; i++) {
            category = this.categoryTargets[i];
            txtValue = category.textContent || category.innerText;
            if (txtValue.toUpperCase().indexOf(string) > -1) {
                category.style.display = "";
            } else {
                category.style.display = "none";
            }
        }
    }
}