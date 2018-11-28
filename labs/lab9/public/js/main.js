const ZIP_URL = 'https://www.showdeolabs.com/cors?url=http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php?zip=';
const COUNTY_URL = 'https://www.showdeolabs.com/cors?url=http://itcdland.csumb.edu/~milara/ajax/countyList.php?state=';

window.onload = initialize;

let selects;
function initialize() {
    
    selects = document.querySelectorAll('select');
    
    loadStates();
    initializeSelect();
    initializeZip();
    
    document.querySelector('#confirm').addEventListener('click', validateForm);
}

function initializeSelect() {
    M.FormSelect.init(selects, {});
}

function initializeZip() {
    
    document.querySelector('#zip-code').addEventListener('keyup', e => {
        setZipData(e.target.value);
    });
}

async function setZipData(zip) {
    const zipCall = await fetch(`${ZIP_URL}${zip}`, {
        method: 'GET',
        headers:{ 'Content-Type': 'application/json'}
    });
    
    // fetch response
    const response = await zipCall.json();
    
    // make resonse JSON data
    const data = JSON.parse(response);

    // set data
    const city = document.querySelector('#city');
    const lat = document.querySelector('#lat');
    const lng = document.querySelector('#lng');
    if (data) {
        city.innerHTML = data.city;
        lat.innerHTML = `Lat: ${data.latitude}`;
        lng.innerHTML = `Lat: ${data.longitude}`;
    }
    
    else {
        city.innerHTML = 'No area found...';
        lat.innerHTML = '';
        lng.innerHTML = '';
    }
}

function loadStates() {
    
    const STATES = {
        "AL": "Alabama",
        "AK": "Alaska",
        "AS": "American Samoa",
        "AZ": "Arizona",
        "AR": "Arkansas",
        "CA": "California",
        "CO": "Colorado",
        "CT": "Connecticut",
        "DE": "Delaware",
        "DC": "District Of Columbia",
        "FM": "Federated States Of Micronesia",
        "FL": "Florida",
        "GA": "Georgia",
        "GU": "Guam",
        "HI": "Hawaii",
        "ID": "Idaho",
        "IL": "Illinois",
        "IN": "Indiana",
        "IA": "Iowa",
        "KS": "Kansas",
        "KY": "Kentucky",
        "LA": "Louisiana",
        "ME": "Maine",
        "MH": "Marshall Islands",
        "MD": "Maryland",
        "MA": "Massachusetts",
        "MI": "Michigan",
        "MN": "Minnesota",
        "MS": "Mississippi",
        "MO": "Missouri",
        "MT": "Montana",
        "NE": "Nebraska",
        "NV": "Nevada",
        "NH": "New Hampshire",
        "NJ": "New Jersey",
        "NM": "New Mexico",
        "NY": "New York",
        "NC": "North Carolina",
        "ND": "North Dakota",
        "MP": "Northern Mariana Islands",
        "OH": "Ohio",
        "OK": "Oklahoma",
        "OR": "Oregon",
        "PW": "Palau",
        "PA": "Pennsylvania",
        "PR": "Puerto Rico",
        "RI": "Rhode Island",
        "SC": "South Carolina",
        "SD": "South Dakota",
        "TN": "Tennessee",
        "TX": "Texas",
        "UT": "Utah",
        "VT": "Vermont",
        "VI": "Virgin Islands",
        "VA": "Virginia",
        "WA": "Washington",
        "WV": "West Virginia",
        "WI": "Wisconsin",
        "WY": "Wyoming"
    };
    
    // create option for each state
    const stateSelect = Array.from(selects)[0];
    Object.keys(STATES).forEach(key => {
       createOption(key, STATES[key], stateSelect);
    });
    
    // listen for state change
    stateSelect.addEventListener('change', setCounty);

    // dispatch event change
    stateSelect.dispatchEvent(new Event('change'));
}

async function setCounty(e) {
    
    const countyCall = await fetch(`${COUNTY_URL}${e.target.value}`, {
        method: 'GET',
        headers:{ 'Content-Type': 'application/json'}
    });
    
    // fetch response
    const response = await countyCall.json();
    
    // make resonse JSON data
    const data = JSON.parse(response);
    
    // create county options
    const countySelect = Array.from(selects)[1];
    clearSelect(countySelect); // clear select before creating new options
    
    if (data.length !== 0) {
        data.map(obj => {
            createOption(obj.county, obj.county, countySelect); 
        });
    }
    
    else {
        createOption('-1', 'No County', countySelect); 
    }
    
    initializeSelect();
}

function clearSelect(select) {
    
    Array.from(select.children).forEach(child => { 
        select.removeChild(child); 
    });
}

function createOption(value, text, parent) {
    
    // create option element
    const option = document.createElement('option');
    option.value = value;
    option.innerHTML = text;
    
    // append option element to parent
    parent.appendChild(option);
}

function validateForm() {
    
    const passwords = Array.from(document.querySelectorAll('input[type="password"]'));
    const formStatus = document.querySelector('#form-status');
    formStatus.className = 'error';
    
    if (passwords[0].value !== passwords[1].value) {
        formStatus.innerHTML = 'Passwords do not match';
        return;
    }
    
    if (document.querySelector('#username').value.length < 10) {
        formStatus.innerHTML = 'Username is not available';
        return;
    }
    
    // form was posted
    formStatus.className = 'success';
    formStatus.innerHTML = 'Account successfully created';
    
}