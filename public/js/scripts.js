function ConfirmDelete() {
  var x = confirm("Tem a certeza que deseja apagar?");
  if (x)
    return true;
  else
    return false;
}