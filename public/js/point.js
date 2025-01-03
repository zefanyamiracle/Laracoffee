const setVisible = (elementOrSelector, visible) =>
    ((typeof elementOrSelector === "string"
        ? document.querySelector(elementOrSelector)
        : elementOrSelector
    ).style.display = visible ? "block" : "none");

// convert point
$("#button_convert_point").click(function (e) {
    e.preventDefault();
    const isValid = $(this).attr("data-isCanConvert");
    console.log($(this).attr("data-isCanConvert"));
    console.log(isValid == "true");

    if (isValid == "true") {
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Setelah proses ini, poin kamu akan dikonversikan sebagai kupon",
            icon: "question",
            confirmButtonText: "Konfirmasi",
            cancelButtonColor: "#d33",
            showCancelButton: true,
            confirmButtonColor: "#08a10b",
            timer: 5000,
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Sedang dalam proses",
                    showConfirmButton: false,
                    timer: 2000,
                }).then((_) => {
                    setVisible("#loading", true);
                    $("#form_convert_point").submit();
                });
            } else if (result.isDismissed) {
                Swal.fire("Action canceled", "", "info");
            }
        });
    } else {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Point kamu tidak cukup!",
            text: "Kumpulkan 50 point untuk mendapatkan 1 kupon",
            showConfirmButton: false,
            timer: 2000,
        });
    }
});
