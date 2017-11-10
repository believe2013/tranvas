<template>
    <div id="EventLocation__Wrapper">
        <label for="location">Локация</label>
        <div id="location">
            <GmapAutocomplete @place_changed="setPlace"  class="search-box form-control" />
            <gmapMap :center="location" :zoom="6" style="width: 100%; height: 350px;">
                <gmapMarker
                        :position="location"
                        :clickable="true"
                        :draggable="true"
                        @click="center=location"
                        @place_changed="setPlace"
                        @position_changed="markerDrag($event)"
                ></gmapMarker>
            </gmapMap>
        </div>
        <input type="hidden" name="lat" v-model="location.lat">
        <input type="hidden" name="long" v-model="location.lng">
    </div>
</template>

<script>
    export default {
        data() {
            return {
                location: {
                    lat: 19.065,
                    lng: 72.99
                },
                markers: [
                    {
                        position: {lat: 19.0, lng: 72.0}
                    }
                ],
            }
        },
        methods: {
            setPlace(place) {
                this.location = {
                    lat: place.geometry.location.lat(),
                    lng: place.geometry.location.lng(),
                }
            },
            markerDrag (position) {
                this.location = {
                    lat: position.lat(),
                    lng: position.lng(),
                }
            }
        }
    }
</script>