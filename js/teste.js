function trocar(){
  const btnModal = document.getElementById('btnModal');
  const btnDelete = document.getElementById('btnDelete');
  const inputModal = document.getElementById('inputModal');
  const inputModalCancelar = document.getElementById('inputModalCancelar');
  inputModal.value = btnModal.value;
  inputModalCancelar.value = btnDelete.value;
}