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

function mostraListaAluguel(){
  $conection = conection();
  
  $query = mysqli_query($conection, "SELECT * from aluguel as a inner join carro c on a.id_carro = c.id_carro where a.id_cliente = 1 and status = 'aberto'");
  
  while($row = mysqli_fetch_array($query)){
    $modelo     = $row['nome'];
    $dataInicial = $row['telefone'];
    $dataFinal    = $row['email'];
    $valor   = $row['cidade'];
    $status   = $row['estado'];
    $multa   = $row['estado'];
    $diasRestantes   = $row['estado'];
    echo '<tr>
            <th scope="row">'.$id.'</th>
              <td>'.$nome.'</td>
              <td style="white-space: nowrap">'.$telefone.'</td>
              <td>'.$email.'</td>
              <td>'.$cidade.' - '.$estado.'</td>
              <td>'.$curso.'</td>
              <td><a href="editar.php?id='.$id.'" title="Clique aqui para editar">
                  <span class="badge badge-info">EDITAR</span></a></td>
          </tr>';
  }
}

?>