<ol class="breadcrumb">
    <li><a href="/">Inicio &nbsp </a></li>
    <li class="active">
        <?php echo '/ '.$pagecfg['viewState']; ?>
    </li>
</ol>

<div class="container py-1">
    <div class="row">
        <div class="col-md-12">
            <hr class="mb-5">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <span class="anchor" id="formLogin"></span>

                    <!-- Inicio do template do Form -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Cadastrar Pessoa</h3>
                        </div>
                        <div class="card-body">

                            <!-- Inicio do Form -->
                            <form action="<?php echo $pagecfg['actionState']; ?>" method="POST">

                                <!-- Input text nome da Pessoa -->
                                <div class="form-group">
                                    <label for="uname1">Nome</label>
                                    <?php 
											$registroPessoaNome = ""; // para não duplicar o input nome, é criado uma variável auxiliar se caso não seja a tela editar, ela setara o valor como vazio no campo, caso seja a tela editar, o valor sera da variável
											if($pagecfg['viewState'] == "Editar Pessoa")
											{
												if($pessoa->nome != null)
												{
													$registroPessoaNome = $pessoa->nome;
												}
											}
										?>
                                        <input type="text" class="form-control" name="nome" id="uname1" placeholder="Digite seu nome" <?php echo $pagecfg['inputState'] ; ?> value="<?php echo $registroPessoaNome ; ?>">
                                        <div class="invalid-feedback">Please enter your username or email</div>
                                </div>
                                <!-- fim input text nome Pessoas -->

                                <!-- Input text Email da Pessoa -->
								<?php 
										$registroPessoaEmail = ""; // para não duplicar o input email, é criado uma variável auxiliar se caso não seja a tela editar, ela setara o valor como vazio no campo, caso seja a tela editar, o valor sera da variável
										if($pagecfg['viewState'] == "Editar Pessoa")
										{
											if($pessoa->email != null)
											{
												$registroPessoaEmail = $pessoa->email;
											}
										}
									?>
								  <div class="form-group">
									<label for="exampleInputEmail1">Endereço de email</label>
									<input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="nome@exemplo.com" <?php echo $pagecfg['inputState'] ; ?> value="<?php echo $registroPessoaEmail ; ?>">
									<small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
								  </div>
                                <!-- fim input text Email Pessoas -->

                                <!-- Select Categoria Pessoa -->
                                <div class="form-group">
                                    <label>Categoria</label>
                                    <select name="categoria" class="form-control" <?php echo $pagecfg['inputState'] ; ?>>
                                        <?php 
												foreach ($categorias as $categoria)
												{
													 echo '<option value="'.$categoria->codigo.'">'.$categoria->nome.'</option>';
												}			
											?>
                                    </select>
                                    <div class="invalid-feedback">Please enter your username or email</div>
                                </div>
                                <!--  Fim Select Categoria Pessoa -->
								<?php
									if (strcmp($pagecfg['viewState'], "Visualizar") != 0) {
								  	   echo '<button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">';
										   echo $pagecfg['btnState'];
									   echo '</button>';
									}
								?>
								<button class="btn btn btn-secondary btn-lg float-left" id="btnLogin" onclick="href='localhost' value="Voltar"> Voltar  </button>

                            </form>
                            <!-- Fim do Form -->
                        </div>
                        <!--/card-body-->
                    </div>

                </div>

            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>

</div>