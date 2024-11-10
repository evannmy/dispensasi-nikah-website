function confirmationDelete(event) {
  event.preventDefault();
  const urlToRedirect = event.currentTarget.getAttribute('href');

  Swal.fire({
    title: "Apakah anda yakin menghapus data ini?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    confirmButtonText: "Ya, hapus!",
    cancelButtonText: "Batal"
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Dihapus!",
        text: "Data berhasil dihapus",
        icon: "success",
        showConfirmButton: false
      });
      setTimeout(function() {
        window.location.href=urlToRedirect;
      }, 1500);
    }
  });
}