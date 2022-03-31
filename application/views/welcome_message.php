<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">
		::selection {
			background-color: #E13300;
			color: white;
		}

		::-moz-selection {
			background-color: #E13300;
			color: white;
		}

		body {
			background-color: #fff;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
			text-decoration: none;
		}

		a:hover {
			color: #97310e;
		}

		h1 {
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		code {
			font-family: Consolas, Monaco, Courier New, Courier, monospace;
			font-size: 12px;
			background-color: #f9f9f9;
			border: 1px solid #D0D0D0;
			color: #002166;
			display: block;
			margin: 14px 0 14px 0;
			padding: 12px 10px 12px 10px;
		}

		#body {
			margin: 0 15px 0 15px;
			min-height: 96px;
		}

		p {
			margin: 0 0 10px;
			padding: 0;
		}

		p.footer {
			text-align: right;
			font-size: 11px;
			border-top: 1px solid #D0D0D0;
			line-height: 32px;
			padding: 0 10px 0 10px;
			margin: 20px 0 0 0;
		}






		.container-veiculos {
			display: flex;
			flex-flow: wrap;
		}

		input,
		select {
			border: 1px solid #b4b4b4;
			border-radius: 5px;
			padding: 10px;
			font-size: 15px;
		}

		button {
			border: none;
			border-radius: 5px;
			padding: 10px;
			font-size: 15px;
			background-color: #0da80d;
			color: #ffffff;
			box-shadow: 0px 0px 5px 1px #c3c3c3;
		}

		label {
			font-weight: bold;
			font-size: 17px;
			width: 100%;
		}

		.formulario-container {
			margin: 10px 0px;
		}

		.carro-item-card {
			border: none;
			padding: 10px;
			border-radius: 5px;
			box-shadow: 0px 0px 10px 1px #d0d0d0;
			width: 230px;
		}

		.carro-item-opcoes {
			display: flex;
			justify-content: space-between;
			margin-top: 10px;
		}

		.carro-item {
			padding: 10px;
		}
	</style>
</head>

<body>


	<div id="container">
		<h1>Adicionar novo veículo</h1>
		<form method="post" action="https://projetos.julianoamasp.com/teste_grupo_AEnova/">
			<input type="hidden" name="acao" value="insert">
		<div>
			<div>
				<div class="formulario-container">
					<label>Marca:</label>
				</div>
				<div class="formulario-container">
					<select name="marca">
						<?php
						for ($i = 0; $i < count($marcas); $i++) {
							echo '<option value="' . $marcas[$i]["MarcaId"] . '">' . $marcas[$i]["MarcaNome"] . '</option>';
						}
						?>
					</select>
				</div>
			</div>
			<div>
				<div class="formulario-container">
					<label>Nome:</label>
				</div>
				<div class="formulario-container">
					<input type="text" name="nome">
				</div>
			</div>
		</div>
		<button>Adicionar</button>
		</form>
	</div>

	<div id="container">
		<h1>Todos os veículos</h1>
		<div class="container-veiculos">



			<?php
			if (count($carros) > 0) {
				for ($i = 0; $i < count($carros); $i++) {
			?>
					<div class="carro-item">
						<div class="carro-item-card">

							<div class="vizualizacao-veiculo<?php echo $i ?>">
								<div>
									<h1><?php echo $carros[$i]["VeiculoNome"] ?></h1>

								</div>
								<div>
									<label>Marca:</label><span> <?php echo $carros[$i]["MarcaNome"] ?></span>
								</div>
							</div>
							<div class=" normal<?php echo $i ?>">
								<div class="carro-item-opcoes">
									<div>
										<button onclick="editar('<?php echo $i ?>')" style="background-color: #f1bf2b;">Editar</button>
									</div>
									<div>
										<form method="post" action="https://projetos.julianoamasp.com/teste_grupo_AEnova/">
											<input type="hidden" name="acao" value="delete">
											<input type="hidden" name="id" value="<?php echo $carros[$i]["VeiculoId"] ?>">
											<button type="submit" style="background-color: #e73700;">Remover</button>
										</form>
									</div>
								</div>
							</div>
							<div class=" editavel<?php echo $i ?>" style="display: none">


								<form method="post" action="https://projetos.julianoamasp.com/teste_grupo_AEnova/">
									<div class="edicao-veiculo<?php echo $i ?>" style="display:none;">


										<div>
											<div>
												<div class="formulario-container">
													<label>Marca:</label>
												</div>
												<div class="formulario-container">
													<select name="marca">
														<?php
														for ($i2 = 0; $i2 < count($marcas); $i2++) {
															$selected = "";
															if ($marcas[$i2]["MarcaId"] == $carros[$i]["MarcaId"]) {
																$selected = "selected";
															}
															echo '<option ' . $selected . ' value="' . $marcas[$i2]["MarcaId"] . '">' . $marcas[$i2]["MarcaNome"] . '</option>';
														}
														?>
													</select>
												</div>
											</div>
											<div>
												<div class="formulario-container">
													<label>Nome:</label>
												</div>
												<div class="formulario-container">
													<input type="text" name="nome" value="<?php echo $carros[$i]["VeiculoNome"] ?>">
												</div>
											</div>
										</div>
									</div>





									<div class="carro-item-opcoes">
										<div>
											<input type="hidden" name="acao" value="update">
											<input type="hidden" name="id" value="<?php echo $carros[$i]["VeiculoId"] ?>">
											<button type="submit" style="background-color: #f1bf2b;">Salvar</button>
										</div>
										<div>
											<button type="button" onclick="cancelareditar('<?php echo $i ?>')">Cancelar</button>

										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
			<?php
				}
			} else {
				echo "<p>Nenhum veículo cadastrado!</p>";
			}
			?>


			<script>
				function editar(classe) {
					document.querySelector(".normal" + classe).style.display = "none";
					document.querySelector(".editavel" + classe).style.display = "block";
					document.querySelector(".vizualizacao-veiculo" + classe).style.display = "none";
					document.querySelector(".edicao-veiculo" + classe).style.display = "block";
				}

				function cancelareditar(classe) {
					document.querySelector(".normal" + classe).style.display = "block";
					document.querySelector(".editavel" + classe).style.display = "none";
					document.querySelector(".vizualizacao-veiculo" + classe).style.display = "block";
					document.querySelector(".edicao-veiculo" + classe).style.display = "none";
				}
				document.addEventListener("submit", function(event) {
					event.preventDefault();
					let confirmacao = confirm("Deseja \"" + event.submitter.innerText + "\"?");
					if (confirmacao) {
						event.target.submit();
					}
				})
			</script>




		</div>
	</div>

</body>

</html>