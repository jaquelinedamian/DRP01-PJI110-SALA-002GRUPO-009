<?php include 'header.php'; ?>
<!-- inicio pagina -->
<?php include 'conexao.php'; ?>
<?php // Consulta SQL para obter os professores cadastrados
$sql_professores = "SELECT * FROM Professores";
$result = $conn->query( $sql_professores );

// Consulta SQL para obter os professores cadastrados
$sql_professores = "SELECT * FROM Professores";
$result_professores = $conn->query( $sql_professores );

?>
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4"> <br>
  <h2>Professores Cadastrados</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>HPI</th>
        <th>HPC</th>
        <th>HPL</th>
        <th>Total H. Semana</th>
        <th>Opções</th>
      </tr>
    </thead>
    <tbody>
      <?php

      if ( $result_professores->num_rows > 0 ) {
        while ( $row = $result_professores->fetch_assoc() ) {
          echo "<tr>";
          echo "<td data-label='ID'>" . $row[ "id" ] . "</td>";
          echo "<td data-label='Nome'>" . $row[ "nome" ] . "</td>";
          echo "<td data-label='HPI'>" . $row[ "hpi" ] . "</td>";
          echo "<td data-label='HPC'>" . $row[ "hpc" ] . "</td>";
          echo "<td data-label='HPL'>" . $row[ "hpl" ] . "</td>";
          echo "<td data-label='Horas semana'>" . $row[ "hora_semana" ] . "</td>";
          echo "<td>" . $row[ include 'opcoes.php' ] . "</td>";


          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='3'>Nenhuma turma cadastrada</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<br>
<h2>Cadastre seus professores</h2>
<br>
<form action="gravar_professor.php" method="post">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
      <div class="input-group flex-nowrap"> <span class="input-group-text" >Nome do professor</span>
        <input type="text" id="nome" class="form-control" name="nome" required>
      </div>
    </div>
    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
      <div class="input-group flex-nowrap"> <span class="input-group-text" >Total de horas por semana</span>
        <input type="number" id="hora_semana" class="form-control" name="hora_semana" required>
      </div>
    </div>
  </div>
  <br>
  <h3>Horários pedagógicos</h3>
  <div class="row">
    <div class="col-12 col-sm-12 col-md-3 col-lg-4 col-xl-4 col-xxl-4">
      <div class="input-group flex-nowrap"> <span class="input-group-text" >HPI</span>
        <input type="number" id="hpi" class="form-control" name="hpi" required>
      </div>
    </div>
    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
      <div class="input-group flex-nowrap"> <span class="input-group-text" >HPC</span>
        <input type="number" id="hpc" class="form-control" name="hpc" required>
      </div>
    </div>
    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
      <div class="input-group flex-nowrap"> <span class="input-group-text" >HPL</span>
        <input type="number" id="hpl" class="form-control" name="hpl" required>
      </div>
    </div>
  </div>
  <br>
  <input type="submit" class="btn btn-primary"  value="Cadastrar">
</form>
<hr>
<form method="post" action="gravar_horarios.php ">
  <h3>Selecione o professor cadastrado e defina os dias e horários que esse professor estará na escola. </h3>
  <p>Essa ação é fundamental para a criação da grade horária. </p>
  <select id="professores" name="professores[]" multiple>
    <?php
    if ( $result_professores->num_rows > 0 ) {
      while ( $row_professor = $result_professores->fetch_assoc() ) {
        echo "<option value='" . $row_professor[ "id" ] . "'>" . $row_professor[ "nome" ] . "</option>";
      }
    } else {
      echo "<option value=''>Nenhum professor cadastrado</option>";
    }
    
    
        
    // Realiza a consulta SQL para obter os nomes dos professores
    $sql_professores = "SELECT * FROM Professores";
    $result_professores = $conn->query($sql_professores);

    // Verifica se há resultados da consulta
    if ($result_professores->num_rows > 0) {
        // Itera sobre cada linha de resultado
        while ($row_professor = $result_professores->fetch_assoc()) {
            // Exibe uma opção para cada professor
            echo "<option value='" . $row_professor["id"] . "'>" . $row_professor["nome"] . "</option>";
        }
    } else {
        // Caso não haja professores cadastrados
        echo "<option value=''>Nenhum professor cadastrado</option>";
    }
    
    
    
    ?>
  </select>
  <div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" role="switch" id="allday"  >
    <label class="form-check-label" for="allday">Todos os dias</label>
  </div>
  <div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" role="switch" id="allhour"  >
    <label class="form-check-label" for="allhour">Todos os horários</label>
  </div>
  </div>
  <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
      <div class="row">
        <?php

        // Array com os dias da semana
        $dias_da_semana = array( "Segunda", "Terça", "Quarta", "Quinta", "Sexta" );

        // Loop pelos dias da semana
        foreach ( $dias_da_semana as $dia ) {
          echo '<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 alert alert-light">';
          echo '<h4>' . $dia . '</h4>';

          // Loop pelos horários das aulas
          for ( $i = 1; $i <= 5; $i++ ) {
            echo '<div class="form-check form-switch">';
            echo '<input class="form-check-input" type="checkbox" name="horarios[]" value="' . $dia . '-' . $i . '" id="horario' . $i . $dia . '">';
            echo '<label class="form-check-label" for="horario' . $i . $dia . '">Horário ' . $i . '</label>';
            echo '</div>';
          }

          echo '</div>';
        }


        ?>
      </div>
    </div>
    <br>
    <br>
    <button type="submit" class="btn btn-primary" class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    Gravar Horários
    </button>
    <br><br>
  </div>
</form>



<?php include 'footer.php'; ?>
