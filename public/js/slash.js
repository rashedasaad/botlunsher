
const sleep = async (dlay) => {
    await new Promise(r => setTimeout(() => r(true), dlay))
}

let btensArray = document.querySelector("#explain");
let popupOverlay = document.querySelector(".popup-overlay");
var vide = document.querySelector("#Videos");
let span = document.querySelector(".popup-overlay span");
let start = document.querySelector(".popup-overlay .active");


btensArray.onclick = async () => {
    popupOverlay.style.display = "block";
};
span.onclick = async () => {
    popupOverlay.style.animation = `zeroScend 1s 1`
    await sleep(500);
    popupOverlay.style.display = "none";
    popupOverlay.style.removeProperty("animation");
    vide.pause();
};


function playVid() {
    vide.play();
    document.querySelector(".fa-stop").className = "fa fa-stop active";
    plays.className = "";
    start.style.opacity = 0;
}
function pauseVid() {
    vide.pause();
    document.querySelector(".fa-stop").className = "fa fa-stop";
    plays.className = "active fa fa-play";
}


// ========== //


let confingArray = document.querySelector("#configBtn");
let input = document.querySelector(".inputBox");

let calba = true;

confingArray.onclick = () => {
    if (calba) {
        input.style.display = "flex";
        calba = false;
    } else {
        input.style.display = "none";
        calba = true;
    };
};

let error = document.querySelector(".error")
let bool = document.querySelector(".boolean")

if (error.value != "" && bool.textContent != 0) {
    if(bool.textContent == 1){
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: error.textContent,
        showConfirmButton: false,
        timer: 3000
        })
    }else if(bool.textContent == 0){
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: error.textContent,
        showConfirmButton: false,
        timer: 3000
        })
    }
}