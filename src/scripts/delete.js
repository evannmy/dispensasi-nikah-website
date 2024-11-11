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
      window.location.href=urlToRedirect;
    }
  });
}