<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListarPessoas extends CI_Controller {	

	//Página de listar pessoas
	public function index()
	{					
		//Carrega o Model Pessoa
		$this->load->model('PessoasModel', 'Pessoas');			//criando a classe PessoasModel atribundi a variavel Pessoas
		$this->load->model('CategoriasModel', 'Categorias');
		
		$data['pessoas'] = $this->Pessoas->getPessoas();     //busca da Model as pessoas
		$data['pagecfg']['Title'] = "Lista de Pessoas";		// Configurando o Padrão State da pagina
		
		//Carregamos a view listarPessoas e passamos como parametro a array Pessoas que guarda todas os Pessoas da tabela
		$this->load->view('templates/header', $data);
		$this->load->view('listarPessoasView', $data);
		$this->load->view('templates/footer', $data);
	}

	//Carregando Pagina Adicionar Pessoa
	public function add()
	{	
		//Carrega o Model Categorias			
		$this->load->model('CategoriasModel', 'Categorias');
	
		$data['categorias'] = $this->Categorias->getCategorias();	

		// Editando texto do titulo do header
		$data['pagecfg']['Title'] = "Adicionar Pessoa";		

		// Alterando o Estado da View Para Adicionar Pessoa
		$data['pagecfg']['viewState'] = "Adicionar Pessoa";
		$data['pagecfg']['btnState'] = "Adicionar";
		$data['pagecfg']['inputState'] = "enable";
		$data['pagecfg']['actionState'] = "/ListarPessoas/salvar";
		
		//Carrega a View
		$this->load->view('templates/header', $data);
		$this->load->view('PessoaView', $data);
		$this->load->view('templates/footer', $data);
	}

	//Carregando Pagina Editar
	public function editarPessoaView($codigo=NULL){
		//Verifica se foi passado o codigo, se não vai para a página listar Pessoas
		if($codigo == NULL) {
			redirect("../../../");// futuramente levantar exceção...
		}
				
		//Carrega o Model Categorias			
		$this->load->model('CategoriasModel', 'Categorias');	
		$data['categorias'] = $this->Categorias->getCategorias();
		
		//Carrega o Model Pessoa
		$this->load->model('PessoasModel', 'Pessoas');	
		//Faz a consulta no banco de dados pra verificar se existe a pessoa
		$query = $this->Pessoas->getPessoaByCodigo($codigo);

		//Verifica que a consulta voltar um registro, se não vai para a página listar pessoas
		if($query == NULL) {
			redirect("../../../"); // levantar exceção...
		}	

		$this->session->set_userdata("codigoPessoa",$codigo);// salvando o codigo do usuario na sessao evintando inject
		
		//Criamos uma array onde vai guardar os dados da pessoa	
		$data['pessoa'] = $query;	
		$data['pagecfg']['viewState'] = "Editar Pessoa";
		$data['pagecfg']['btnState'] = "Editar";
		$data['pagecfg']['inputState'] = "enable";
		$data['pagecfg']['actionState'] = "/ListarPessoas/editar";
		
		// Editando texto do titulo do header
		$data['pagecfg']['Title'] = "Adicionar Pessoa";		
		//Carrega a View
		$this->load->view('templates/header', $data);
		$this->load->view('PessoaView', $data);
		$this->load->view('templates/footer', $data);
	}
	
	//Função Apagar registro da pessoa
	public function apagar($codigo=NULL)
	{
		if($codigo == NULL) {
			self::index();
		}
		
		$this->load->model('PessoasModel', 'Pessoas');
		$query = $this->Pessoas->getPessoaByCodigo($codigo);
		
		if($query != NULL) {			
			//Executa a função deletar pessoa do banco
			$this->Pessoas->deletePessoa($query->codigo);
			redirect("../../../../");		
		} else {
			redirect("../../../../");

		}	
	}

	//Funcao Visualizar
	public function visualizar($codigo=NULL)
	{
		//Verifica se foi passado o codigo, se não vai para a página listar Pessoas
		if($codigo == NULL) {
			redirect("../../../");// futuramente levantar exceção...
		}
				
		//Carrega o Model Categorias			
		$this->load->model('CategoriasModel', 'Categorias');	
		$data['categorias'] = $this->Categorias->getCategorias();
		
		//Carrega o Model Pessoa
		$this->load->model('PessoasModel', 'Pessoas');	
		//Faz a consulta no banco de dados pra verificar se existe a pessoa
		$query = $this->Pessoas->getPessoaByCodigo($codigo);

		//Verifica que a consulta voltar um registro, se não vai para a página listar pessoas
		if($query == NULL) {
			redirect("../../../"); // levantar exceção...
		}	

		$this->session->set_userdata("codigoPessoa",$codigo);// salvando o codigo do usuario na sessao evintando inject
		
		//Criamos uma array onde vai guardar os dados da pessoa	
		$data['pessoa'] = $query;	
		$data['pagecfg']['viewState'] = "Visualizar";
		$data['pagecfg']['inputState'] = "disabled";
		$data['pagecfg']['btnState'] = "disable";
		$data['pagecfg']['actionState'] = "false";
		
		// Editando texto do titulo do header
		$data['pagecfg']['Title'] = "Adicionar Pessoa";		
		//Carrega a View
		$this->load->view('templates/header', $data);
		$this->load->view('PessoaView', $data);
		$this->load->view('templates/footer', $data);	
		
	}


////////////////////////////////BD	
	//Função salvar no DB
	public function salvar()
	{
		
		//Carrega o Model Pessoas				
		$this->load->model('PessoasModel', 'Pessoas');

		//post para array $dados
		$dados['nome'] = $this->input->post('nome');
		$dados['email'] = $this->input->post('email');		
		$dados['categoria'] = $this->input->post('categoria');
			

		//Executa a função do Pessoas_model adicionar
		$this->Pessoas->addPessoa($dados);

		//Fazemos um redicionamento para a página 		
		redirect("../../../");	

	}
	
	//Função Editar no DB
	public function editar()
	{
		
		//Carrega o Model Pessoas				
		$this->load->model('PessoasModel', 'Pessoas');

		//post para array $dados
		$dados['nome'] = $this->input->post('nome');
		$dados['email'] = $this->input->post('email');		
		$dados['categoria'] = $this->input->post('categoria');		
		
		$codigo = $this->session->userdata('codigoPessoa'); // buscando codigo da sessao evitando inject

		//Executa a função do Pessoas_model adicionar
		$this->Pessoas->setPessoa($dados, $codigo);

		//Fazemos um redicionamento para a página 		
		redirect("../../../");		

	}


	
}