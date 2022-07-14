let header = document.querySelector(".color-bar");
let sticky = header.offsetTop - 90;
let latitude;
let longitude;

function myFunction() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
}

function ShowDiv() {
    let mainObj = document.getElementById("main-obj-map");
    mainObj.style.visibility = "visible";
}

// position and map ---

function initMap(lat, lng) {
    let elMap = document.querySelector("#map");

    let options = {
        center: { lat: lat, lng: lng },
        zoom: 14,
    };
    let map = new google.maps.Map(elMap, options);
    return new google.maps.Marker({
        position: { lat, lng },
        map,
        title: "My location",
    });
}

function getPosition() {
    if (!navigator.geolocation) {
        alert("HTML5 Geolocation is not supported in your browser.");
        return;
    }

    let mapSect = document.getElementsByClassName("map-sect");
    $("#rpt #map-sect").css("display", "block");
    $("#rpt #map-sect").css("position", "relative");
    navigator.geolocation.getCurrentPosition(showLocation, handleLocationError);
}

function mapReady() {
    console.log("Map is ready");
}

function showLocation(position) {
    longitude = position.coords.longitude;
    latitude = position.coords.latitude;
    document.getElementById("longitude").value = longitude;
    document.getElementById("latitude").value = latitude;

    console.log(longitude, latitude);
    initMap(position.coords.latitude, position.coords.longitude);
}

function handleLocationError(error) {
    let locationError = document.getElementById("locationError");

    switch (error.code) {
        case 0:
            locationError.innerHTML =
                "There was an error while retrieving your location: " + error.message;
            break;
        case 1:
            locationError.innerHTML =
                "The user didn't allow this page to retrieve a location.";
            break;
        case 2:
            locationError.innerHTML =
                "The browser was unable to determine your location: " + error.message;
            break;
        case 3:
            locationError.innerHTML =
                "The browser timed out before retrieving the location.";
            break;
    }
}

function showPosition(position) {
    latitude = position.coords.latitude;
    longitude = position.coords.longitude;
}

function printLocation() {}

// end position and map
$(document).ready(() => {
    //Desktop:
    // TAKING THE GREEN LINE FUNCTION
    window.onscroll = function() {
        myFunction();
    };

    // SCROLLING FUNCTION
    $(window).scroll(function(event) {
        let scroll = $(this).scrollTop();
        let opacity = scroll / 400;
        let rgba = "rgba(19, 127, 127," + opacity + ")";
        if (opacity >= 0) {
            $(".navbar").css("background-color", rgba);
        }
    });
});

function sortTable(n) {
    var table,
        rows,
        switching,
        i,
        x,
        y,
        shouldSwitch,
        dir,
        switchcount = 0;
    table = document.getElementById("srt-tbl");
    switching = true;
    dir = "asc";
    while (switching) {

        switching = false;
        rows = table.rows;

        for (i = 1; i < rows.length - 1; i++) {
            shouldSwitch = false;

            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];

            if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {

                    shouldSwitch = true;
                    break;
                }
            } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {

                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {

            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;

            switchcount++;
        } else {

            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}