window.addEventListener("DOMContentLoaded", (event) => {
    // Popup pertama: Menampilkan pesan sambutan
    Swal.fire({
        title: "Selamat Datang di Media Veggie Coffee!",
        text: "Terima kasih telah mengunjungi website kami. Jelajahi lebih banyak informasi tentang produk kami.",
        icon: "info",
        confirmButtonText: "Selanjutnya",
        confirmButtonColor: "#08a10b",
        showCancelButton: false,
        customClass: {
            popup: 'custom-popup',
            title: 'custom-title',
            content: 'custom-content',
            closeButton: 'custom-close-btn'
        },
        didOpen: () => {
            // Menambahkan elemen close secara manual
            const closeButton = document.createElement('button');
            closeButton.innerHTML = '&times;';
            closeButton.classList.add('swal2-close', 'custom-close-btn');
            closeButton.onclick = () => {
                Swal.close(); 
            };

            const popup = Swal.getPopup();
            popup.appendChild(closeButton);
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Popup kedua: Menampilkan gambar promo
            Swal.fire({
                imageUrl: 'storage/home/promo.png',
                imageWidth: 500,
                imageHeight: 500,
                imageAlt: 'Promo Image',
                confirmButtonText: "Selanjutnya",
                confirmButtonColor: "#08a10b",
                showCancelButton: false,
                customClass: {
                    popup: 'custom-popup',
                    title: 'custom-title',
                    content: 'custom-content'
                },
                didOpen: () => {
                    const closeButton = document.createElement('button');
                    closeButton.innerHTML = '&times;';
                    closeButton.classList.add('swal2-close', 'custom-close-btn');
                    closeButton.onclick = () => {
                        Swal.close(); 
                    };

                    const popup = Swal.getPopup();
                    popup.appendChild(closeButton);
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Popup ketiga: Menampilkan gambar lain
                    Swal.fire({
                        imageUrl: 'storage/home/lawyer.png',  // Ganti dengan path gambar promo kedua
                        imageWidth: 500,
                        imageHeight: 500,
                        imageAlt: 'Promo Image 2',
                        confirmButtonText: "Selanjutnya",
                        confirmButtonColor: "#08a10b",
                        showCancelButton: false,
                        customClass: {
                            popup: 'custom-popup',
                            title: 'custom-title',
                            content: 'custom-content'
                        },
                        didOpen: () => {
                            const closeButton = document.createElement('button');
                            closeButton.innerHTML = '&times;';
                            closeButton.classList.add('swal2-close', 'custom-close-btn');
                            closeButton.onclick = () => {
                                Swal.close(); 
                            };

                            const popup = Swal.getPopup();
                            popup.appendChild(closeButton);
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Popup keempat: Menampilkan gambar lain lagi
                            Swal.fire({
                                imageUrl: 'storage/home/takari.png',  // Ganti dengan path gambar promo ketiga
                                imageWidth: 500,
                                imageHeight: 500,
                                imageAlt: 'Promo Image 3',
                                confirmButtonText: "Tutup",
                                confirmButtonColor: "#08a10b",
                                showCancelButton: false,
                                customClass: {
                                    popup: 'custom-popup',
                                    title: 'custom-title',
                                    content: 'custom-content'
                                },
                                didOpen: () => {
                                    const closeButton = document.createElement('button');
                                    closeButton.innerHTML = '&times;';
                                    closeButton.classList.add('swal2-close', 'custom-close-btn');
                                    closeButton.onclick = () => {
                                        Swal.close();
                                    };

                                    const popup = Swal.getPopup();
                                    popup.appendChild(closeButton);
                                }
                            });
                        }
                    });
                }
            });
        }
    });

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector("#sidebarToggle");
    if (sidebarToggle) {
        if (localStorage.getItem("sb|sidebar-toggle") == "true") {
            document.body.classList.toggle("sb-sidenav-toggled");
        }
        sidebarToggle.addEventListener("click", (event) => {
            event.preventDefault();
            document.body.classList.toggle("sb-sidenav-toggled");
            localStorage.setItem(
                "sb|sidebar-toggle",
                document.body.classList.contains("sb-sidenav-toggled")
            );
        });
    }

    // SweetAlert2 for logout
    $("button.auth_logout").click(function (e) {
        e.preventDefault();
        const form = document.getElementById("form_auth_logout");

        Swal.fire({
            title: "Are you sure?",
            text: "Click logout if you want to end your session",
            confirmButtonText: "Logout",
            cancelButtonColor: "#d33",
            showCancelButton: true,
            confirmButtonColor: "#08a10b",
            timer: 10000,
        }).then((result) => {
            if (result.isConfirmed) {
                let timerInterval;
                Swal.fire({
                    title: "Auto close alert!",
                    html: "I will close in <b></b> milliseconds.",
                    timer: 1000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                        const b = Swal.getHtmlContainer().querySelector("b");
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft();
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    },
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        form.submit();
                    }
                });
            } else {
                Swal.fire("Failed, request timeout", "", "info");
            }
        });
    });
});
