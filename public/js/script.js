function togglePasswordVisibility() {
    var passwordField = document.getElementById("password");
    if (passwordField.type === "password") {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}

const tooltipTriggerList = document.querySelectorAll(
    '[data-bs-toggle="tooltip"]'
);
const tooltipList = [...tooltipTriggerList].map(
    (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
);

const myModal = document.getElementById("myModal");
const myInput = document.getElementById("myInput");

myModal.addEventListener("shown.bs.modal", () => {
    myInput.focus();
});

function showModal() {
    var modal = document.getElementById("loginModal");
    modal.style.display = "block";
}

// Fungsi untuk menyembunyikan modal
function hideModal() {
    var modal = document.getElementById("loginModal");
    modal.style.display = "none";
}

// Menangkap semua tombol "Login" pada navbar
var loginButtons = document.querySelectorAll(
    '[data-toggle="modal"][data-target="#loginModal"]'
);

// Mendaftarkan event listener pada setiap tombol "Login"
loginButtons.forEach(function (button) {
    button.addEventListener("click", showModal);
});

// Menangkap tombol "Close" pada modal
var closeButton = document.querySelector("#loginModal .close");

// Mendaftarkan event listener pada tombol "Close"
closeButton.addEventListener("click", hideModal);
