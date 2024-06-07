// untuk mengaktifkan smooth scrolling
const navBar = document.querySelector(".navbar");

window.addEventListener("scroll", () => {
    const windowPosition = window.scrollY > 0;
    navBar.classList.toggle("scrolling-active", windowPosition);
});

// Ambil tombol "Join With Us" berdasarkan ID
const joinBtn = document.getElementById("joinBtn");

// Tambahkan event listener untuk klik pada tombol
joinBtn.addEventListener("click", function () {
    // Ambil elemen target scroll (bagian Projects)
    const projectsSection = document.getElementById("destinasi");

    // Lakukan scroll otomatis ke bagian Projects
    projectsSection.scrollIntoView({ behavior: "smooth" });
});
