
  <a href="/ListarPessoas/add" class="btn btn-success margin-button15 btn-lg" style="margin-bottom:10px; width: 130px">Nova Pessoa</a>

  <table id="example" class="table table-striped table-bordered" s>
	 
	 <thead>
		<tr>
		   <th class="text-center col-md-3" scope="col">Nome</th>
		   <th class="text-center col-md-3" scope="col">Email</th>
		   <th class="text-center col-md-3" scope="col">Categoria</th>
		   <th class="text-center col-md-3" scope="col">Comandos</th>
		</tr>
	 </thead>	 
	 <tbody >
		<?php
		   $contador = 0;
		   foreach ($pessoas as $pessoa)
		   {        
			echo '<tr>';
			  echo '<td class="text-center" scope="row">'.$pessoa->nome.'</td>'; 
			  echo '<td class="text-center" scope="row">'.$pessoa->email.'</td>'; 
			  echo '<td class="text-center" scope="row">'.$pessoa->NomeCategoria.'</td>'; 				  
			  echo '<td class="text-center" scope="row">';			  
				echo '<a href="/ListarPessoas/editarPessoaView/'.$pessoa->codigo.'" title="Editar pessoa" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
				echo ' <a href="/ListarPessoas/apagar/'.$pessoa->codigo.'" title="Apagar pessoa" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>';
				echo ' <a href="/ListarPessoas/visualizar/'.$pessoa->codigo.'" title="Detalhes" class="btn btn-info"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>';				  
			  echo '</td>'; 
			echo '</tr>';
		   $contador++;
		   }
		   ?>
	 </tbody>	 
  </table>
  



<!-- Import Data Table CSS -->
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Import Data Table JSS -->
<script src="/application/third_party/dataTable/js/jquery.dataTables.min.js"></script>
<script src="/application/third_party/dataTable/js/dataTables.bootstrap4.min.js"></script>
<script src="/application/third_party/tablePaginator/pagination.js"></script>

