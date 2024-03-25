// Toggle Switch Location
const locationForm = document.getElementById('location-switch-form');
const locationArrow = document.getElementById('location-arrow');
document.getElementById('switch-location-btn').addEventListener('click', showLocationForm);

function showLocationForm(){
    locationForm.classList.toggle('show');
    locationArrow.classList.toggle('clicked');
}