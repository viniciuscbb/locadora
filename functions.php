<?php
include('config.php');

function conection(){
  include('config.php');
  $conection = new mysqli($host, $user, $password, $dbname);
  mysqli_set_charset($conection, "utf8");
  if (!$conection) {
    die("Não foi possível conectar ao banco de dados" . mysqli_connect_error());
  }else{
    return $conection;
  }
}

function calcDias($dataFinal){
    $dataInicial = date('Y-m-d');
    $time_inicial = strtotime($dataInicial);
    $time_final = strtotime($dataFinal);
    $diferenca = $time_final - $time_inicial;
    $dias = (int) floor($diferenca / (60 * 60 * 24));
    $diasRestantes   = $dias; 
    if($diasRestantes < 1){
      $dias = 0;
    }
    return $dias;
}

function calcMulta($dataFinal, $valor, $id){
  $conection = conection();
  if(calcDias($dataFinal) < 1){
    $dataInicial = date('Y-m-d');
    $time_inicial = strtotime($dataInicial);
    $time_final = strtotime($dataFinal);
    $diferenca = $time_final - $time_inicial;
    $dias = (int) floor($diferenca / (60 * 60 * 24));
    $diasRestantes   = $dias;
    $multa = abs($diasRestantes) * ($valor * 2/100);
    $conection = conection();
    $busca = "UPDATE aluguel SET multa = '$multa' where id_aluguel = '$id'";
    if(mysqli_query($conection, $busca)){
    }
    
  }else{
    $multa = 0;
  }
  return $multa;
}

function getDebito(){
    $id = UserID();
    $conection = conection();
    $busca = "SELECT sum(valor) as total FROM aluguel WHERE id_cliente='$id' and status = 'aberto'";
    $identificacao = mysqli_query($conection, $busca);
    $retorno = mysqli_fetch_array($identificacao);
    $valor = $retorno['total'];

    $busca = "SELECT sum(multa) as multa FROM aluguel WHERE id_cliente='$id'";
    $identificacao = mysqli_query($conection, $busca);
    $retorno = mysqli_fetch_array($identificacao);
    $multa = $retorno['multa'];
    $resultado = $valor + $multa;

    $result = number_format($resultado, 2, ',', '.');
    return $result;
}

function mostraListaAluguel($ID){
  $conection = conection();
  
  $query = mysqli_query($conection, "SELECT * from aluguel as a inner join carro c on a.id_carro = c.id_carro where a.id_cliente = '$ID' and status = 'aberto'");
  
  while($row = mysqli_fetch_array($query)){
    $ID = $row['id_aluguel'];
    $modelo     = $row['modelo'];
    $dataInicial = $row['data_aluguel'];
    $dataFinal    = $row['data_vencimento'];
    $valor   = $row['valor'];
    $status   = $row['status'];
    
    echo '<tr  class="tr-shadow">
            <td>'.$modelo.'</td>
            <td>'.$dataInicial.'</td>
            <td>'.$dataFinal.'</td>
            <td>R$'.number_format($valor, 2, ',', '.').'</td>
            <td>'.$status.'</td>
            <td>R$'.number_format(calcMulta($dataFinal, $valor, $ID), 2, ',', '.').'</td>
            <td>'.calcDias($dataFinal).'</td>
            <td>
              <div class="table-data-feature">
                <button onclick="trocar()" name="btnModal" type="button" data-toggle="modal" data-target="#staticModal" class="btn btn-success btn-sm" id="btnModal" value='.$ID.'>
                  <i class="fa fa-clock-o"></i>&nbsp;Adiar
                </button>
                <button onclick="trocar()" name="btnDelete" type="button" data-toggle="modal" data-target="#smallmodal" class="btn btn-danger btn-sm" id="btnDelete" value='.$ID.'>
                  <i class="fa fa-times-circle"></i>&nbsp;Cancelar
                </button>
              </div>
            </td>
          </tr>';
  }
}

?>