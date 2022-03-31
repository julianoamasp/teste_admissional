<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->database();
		if (array_key_exists("acao",$_POST)) {
			if ($_POST["acao"] == 'insert') {
				
				$this->db->query("INSERT INTO `Veiculo` (`VeiculoId`, `VeiculoNome`, `VeiculoMarca`) VALUES (NULL, '" . $_POST["nome"] . "', '" . $_POST["marca"] . "');");
				header("Location: https://projetos.julianoamasp.com/teste_grupo_AEnova/");
				exit;
			}
			if ($_POST["acao"] ==  'update') {
				$this->db->query("UPDATE `Veiculo` SET `VeiculoNome` = '" . $_POST["nome"] . "', `VeiculoMarca` = " . $_POST["marca"] . " WHERE `Veiculo`.`VeiculoId` = " . $_POST["id"] . ";");
				header("Location: https://projetos.julianoamasp.com/teste_grupo_AEnova/");
				exit;
			}
			if ($_POST["acao"] ==  'delete') {
				$this->db->query("DELETE FROM `Veiculo` WHERE `Veiculo`.`VeiculoId` = '" . $_POST["id"] . "'");
				header("Location: https://projetos.julianoamasp.com/teste_grupo_AEnova/");
				exit;
			}
		}

		$query = $this->db->query('SELECT * FROM Marca');
		$DADOS["marcas"] = $query->result_array();

		$query2 = $this->db->query('SELECT * FROM Veiculo, Marca where VeiculoId IS NOT NULL AND MarcaId = VeiculoMarca');
		$DADOS["carros"] = $query2->result_array();

		$this->load->view('welcome_message', $DADOS);
	}
}
