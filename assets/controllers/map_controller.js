import { Controller } from "@hotwired/stimulus";
import leaflet from 'leaflet';

export default class extends Controller {
    static targets = ['map'];
    static values = {
        latlong: Array,
    }

    connect() {

        console.log("test");
        console.log(this.latlongValue);
        console.log(this.latlongValue.length);
        console.log(this.latlongValue[2]);

         let map = L.map(this.mapTarget, {
            closePopupOnClick: false,
            scrollWheelZoom: false,
            minZoom: 10,
            maxZoom: 18,
        })
            .setView([37.558629, -233.073449], 14);

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
            .setContent("You are here")
            .openOn(map)

        for (let i = 0; i < this.latlongValue.length; i++) {
            if (this.latlongValue[i][1] != null) {
                let hobbyLatlong = this.latlongValue[i][1].split(",")
                let hobbyName = this.latlongValue[i][0]
                console.log(hobbyLatlong)

                let popup = L.popup({
                    autoClose: false,
                    closeOnEscapeKey: false,
                    closeOnClick: false,
                    closeButton: false,
                    className: 'marker',
                    maxWidth: 400
                })
                    .setLatLng([hobbyLatlong[0],hobbyLatlong[1]])
                    .setContent(hobbyName)
                    .openOn(map)
            }
        }
    }
}