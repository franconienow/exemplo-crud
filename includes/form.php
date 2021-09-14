<main>
  <section class="pb-4">
    <div class="container">
      <h2 class="my-4 h4"><?=title?></h2>
      <form method="post" class="text-dark">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="nameInput" name="nameInput" placeholder="Nome: ex Lebron James" value="<?=$objClient->name?>">
          <label for="nameInput">Nome: ex Lebron James</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="addressInput" name="addressInput" placeholder="Endereço: ex Rua Guarani, 787" value="<?=$objClient->address?>">
          <label for="addressInput">Endereço: ex Rua Guarani, 787</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="cepInput" name="cepInput" placeholder="Cep: ex 93520150" value="<?=$objClient->zip?>">
          <label for="cepInput">Cep: ex 93520150</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="telInput" name="telInput" placeholder="Telefone: ex 519999999" value="<?=$objClient->phone?>">
          <label for="telInput">Telefone: ex 519999999</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="celInput" name="celInput" placeholder="Celular: ex 519999999" value="<?=$objClient->mPhone?>">
          <label for="celInput">Celular: ex 519999999</label>
        </div>
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="emailInput" name="emailInput" placeholder="Email: ex email@mail.com" value="<?=$objClient->email?>">
          <label for="emailInput">Email: ex email@mail.com</label>
        </div>
        <div class="form-floating mb-3">
          <select class="form-select" id="sexoInput" name="sexoInput">
            <option value="masculino" <?=$objClient->gender == 'masculino' ? 'selected' : '' ?>>Masculino</option>
            <option value="feminino" <?=$objClient->gender == 'feminino' ? 'selected' : ''?>>Feminino</option>
            <option value="nonbinary" <?=$objClient->gender == 'nobinary' ? 'selected' : ''?>>Outro</option>
          </select>
          <label for="sexoInput">Sexo</label>
        </div>
        <div class="form-floating mb-3">
          <textarea class="form-control" placeholder="Observações" id="observationsInput" name="observationsInput" style="height: 100px"></textarea>
          <label for="observationsInput">Observações</label>
        </div>
        <button type="submit" class="btn btn-success"><?=title?></button>
        <button type="reset" class="btn btn-outline-danger">Cancelar</button>
      </form>
    </div>
  </section>
</main>