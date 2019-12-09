function trocar(id){
  const inputModal = document.getElementById('inputModal');
  const inputModalCancelar = document.getElementById('inputModalCancelar');
  inputModal.value = id;
  inputModalCancelar.value = id;
}

function trocarAlugar(id){
  const inputModal = document.getElementById('imgCarro');
  const inputModalCancelar = document.getElementById('inputModalCancelar');
  inputModalCancelar.value = id;
  inputModal.src = `../images/carros/${id}.jpg`;
  
}
