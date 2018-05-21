<div id="page-wrapper">
	<header id="header">
		<div class="container">
			<h1 class="text-center">Entrevista Socio-Econômica</h1>
		</div>
	</header>
	<br>
	<section>
		<div class="container">
			<h3 class="text-center">Confirme seus dados:</h3>
			<div class="col-sm-6 col-sm-offset-3">
				<form method="POST">
					<div class="form-group">
						<input type="hidden" name="token-entrevista-login" value="<?php echo Session::get('token-entrevista-login');?>">
						<input type="text" class="form-control" name="cpf" id="cpf" placeholder="Digite seu CPF" />
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="nascimento" id="nascimento" placeholder="Digite sua data de nascimento" />
					</div>
						<button class="btn btn-block btn-outline" type="submit">Entrar!</button>
				</form>
			</div>
		</div>
	</section>
</div>