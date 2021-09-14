<?php
  $message = '';
  if(isset($_GET['status'])){
    switch ($_GET['status']) {
      case 'success':
        $message = '<div class="alert alert-success">Ação executada com sucesso!</div>';
        break;

      case 'error':
        $message = '<div class="alert alert-danger">Ação não executada!</div>';
        break;
    }
  }
  $results = '';

  foreach($clients as $client){
    $results .= '<tr>
      <td>'.$client->id.'</td>
      <td>'.$client->name.'</td>
      <td>'.$client->address.'</td>
      <td>'.$client->zip.'</td>
      <td>'.$client->phone.'</td>
      <td>'.$client->mPhone.'</td>
      <td>'.$client->email.'</td>
      <td>'.$client->gender.'</td>
      <td>'.$client->obs.'</td>
      <td>
        <a href="edit.php?id='.$client->id.'" class="btn btn-primary"><i class="bi bi-pencil"></i></a>
        <a href="delete.php?id='.$client->id.'" class="btn btn-danger"><i class="bi bi-trash"></i></a>
      </td>
      </tr>';
  }

  $results = strlen($results) ? $results : '<tr>
                                                <td colspan="10" class="text-center">
                                                      Nenhuma vaga encontrada
                                                </td>
                                            </tr>';
?>

<main>
  <section class="pb-4">
    <div class="container">
      <?=$message?>
      <table class="table text-light">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Endereço</th>
            <th scope="col">CEP</th>
            <th scope="col">Telefone</th>
            <th scope="col">Celular</th>
            <th scope="col">Email</th>
            <th scope="col">Gênero</th>
            <th scope="col">Observações</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?=$results?>
        </tbody>
      </table>
    </div>
  </section>
  <section class="py-4">
    <div class="container">
      <a href="create.php" class="btn btn-success">Novo Cliente <i class="bi bi-plus-circle-dotted"></i></a>
    </div>
  </section>
</main>