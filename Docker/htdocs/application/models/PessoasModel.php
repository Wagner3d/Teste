<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PessoasModel extends CI_Model
{	
    //buscando as pessoas do banco	
    public function getPessoas()
    {           
		// pessoas innerjoin categorias
        $this->db->select('Pessoas.codigo, Pessoas.nome, Pessoas.email, Pessoas.categoria, Categorias.nome as NomeCategoria');
		$this->db->from('Pessoas');
		$this->db->join('Categorias', 'Categorias.codigo = Pessoas.categoria');
		$query = $this->db->get();
        return $query->result();
    }

    //Adiciona uma nova pessoa
    public function addPessoa($dados=NULL)
	{
	if ($dados != NULL):
		$this->db->insert("Pessoas", $dados);		
	endif;
	}   

	//recupera uma pessoa do banco pelo codigo
    public function getPessoaByCodigo($codigo=NULL)
    {
    if ($codigo != NULL):
        //Verifica se existe o codigo no banco de dados
        $this->db->where('codigo', $codigo);        
        //limita para apenas um regstro    
        $this->db->limit(1);
        $query = $this->db->get("Pessoas");        
        //retornamos o registro
        return $query->row();   
    endif;
    } 	
	
	//Atualizar Pessoa no Banco
    public function setPessoa($dados=NULL, $codigo=NULL)
    {
    //Verifica se foi passado $dados e $codigo    
    if ($dados != NULL && $codigo != NULL):
        //Se foi passado atualiza
        $this->db->update('Pessoas', $dados, array('codigo'=>$codigo));      
    endif;
    }   
     

	//Apaga uma pessoa da tabela
    public function deletePessoa($codigo=NULL){

        if ($codigo != NULL):
            //Executa a função DELETE no banco de dados
            $this->db->delete('Pessoas', array('codigo'=>$codigo));            
        endif;
    }  	
}