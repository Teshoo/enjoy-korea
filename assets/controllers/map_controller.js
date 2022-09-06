import { Controller } from "@hotwired/stimulus";
import leaflet from 'leaflet';

export default class extends Controller {
    static targets = ['map'];

    connect() {
        console.log('?');
        let map = L.map(this.mapTarget, {
            closePopupOnClick: false,
            scrollWheelZoom: false,
            minZoom: 10,
            maxZoom: 18,
        })
            .setView([37.558629, -233.073449], 16);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>'
        }).addTo(map);

        let popup = L.popup({
            autoClose: false,
            closeOnEscapeKey: false,
            closeOnClick: false,
            closeButton: false,
            className: 'marker',
            maxWidth: 400
        })
            .setLatLng([37.558629, -233.073449])
            .setContent("text")
            .openOn(map)

    }
}