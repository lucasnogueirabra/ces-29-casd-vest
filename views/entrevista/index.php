<div id="page-wrapper">
	<header id="header">
		<div class="container">
			<div class="img-container">
				<img src="<?php echo URL;?>images/vestibulinhoCASDV.png" class="img-responsive"/>
			</div>
			<h1 class="text-center">Entrevista Socio-Econônmica </h1>
			<hr>
		</div>
	</header>
	<br>
	<br>
	<section id="entrevista-forms">
		<div class="container">
			<!--<?php if(!$this->erro === false) { ?>
			<div class="alert alert-danger col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">Erro ao enviar dados, tente novamente!</div>
			<?php } ?>-->
			<div class="col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0" id="inscricao_container">
			<br>
				<form method="POST">
					<input type="hidden" name="token-entrevista-index" value="<?php echo(Session::get('token-entrevista-index'));?>">
					<div class="form-group vestibulinho_item">
						<label class="vestibulinhoLabel">Número de pessoas na família* <span style="font-size: 12px; color: red;">(Dados marcados com * são de preenchimento obrigatório)</span></label>
						<input class="form-control vestibulinhoForm" type="number" name="numero_pessoas" id="numero_pessoas" required />
					</div>
					<div class="form-group vestibulinho_item">
						<label class="vestibulinhoLabel">IPTU*</label>
						<input class="form-control vestibulinhoForm" type="text" name="iptu" id="iptu" required />
					</div>

					<div class="form-group vestibulinho_item">
						<label class="vestibulinhoLabel">Veículos*</label>
						<input class="form-control vestibulinhoForm" type="text" name="IPTU" id="IPTU" required />
					</div>
					<div class="form-group vestibulinho_item">
						<label class="vestibulinhoLabel">Holerite Mês 1*</label>
						<input class="form-control vestibulinhoForm" type="text"  name="holerites_1" id="holerites_1" required />
					</div>

					<div class="form-group vestibulinho_item">
						<label class="vestibulinhoLabel">Holerite Mês 2*</label>
						<input class="form-control vestibulinhoForm" type="text"  name="holerites_2" id="holerites_2" required />
					</div>

					<div class="form-group vestibulinho_item">
						<label class="vestibulinhoLabel">Holerite Mês 3*</label>
						<input class="form-control vestibulinhoForm" type="text"  name="holerites_3" id="holerites_3" required />
					</div>

					<div class="form-group vestibulinho_item">
						<label class="vestibulinhoLabel">Aposentadorias*</label>
						<input class="form-control vestibulinhoForm" type="text" name="aposentadorias" id="aposentadorias" required />
					</div>
					<div class="form-group vestibulinho_item">
						<label class="vestibulinhoLabel">Auxílios*</label>
	                    <input class="form-control vestibulinhoForm" type="text" name="auxilios" id="auxilios" required />
					</div>

					<div class="form-group vestibulinho_item">
						<label class="vestibulinhoLabel">Água Mês 1*</label>
						<input class="form-control vestibulinhoForm" type="text"  name="agua_1" id="agua_1" required />
					</div>

					<div class="form-group vestibulinho_item">
						<label class="vestibulinhoLabel">Água Mês 2*</label>
						<input class="form-control vestibulinhoForm" type="text"  name="agua_2" id="agua_2" required />
					</div>

					<div class="form-group vestibulinho_item">
						<label class="vestibulinhoLabel">Água Mês 3*</label>
						<input class="form-control vestibulinhoForm" type="text"  name="agua_3" id="agua_3" required />
					</div>

					<div class="form-group vestibulinho_item">
						<label class="vestibulinhoLabel">Luz Mês 1*</label>
						<input class="form-control vestibulinhoForm" type="text"  name="luz_1" id="luz_1" required />
					</div>

					<div class="form-group vestibulinho_item">
						<label class="vestibulinhoLabel">Luz Mês 2*</label>
						<input class="form-control vestibulinhoForm" type="text"  name="luz_2" id="luz_2" required />
					</div>

					<div class="form-group vestibulinho_item">
						<label class="vestibulinhoLabel">Luz Mês 3*</label>
						<input class="form-control vestibulinhoForm" type="text"  name="luz_3" id="luz_3" required />
					</div>

					<div class="form-group vestibulinho_item">
						<label class="vestibulinhoLabel">NET/TV Mês 1*</label>
						<input class="form-control vestibulinhoForm" type="text"  name="net_1" id="net_1" required />
					</div>

					<div class="form-group vestibulinho_item">
						<label class="vestibulinhoLabel">NET/TV Mês 2*</label>
						<input class="form-control vestibulinhoForm" type="text"  name="net_2" id="net_2" required />
					</div>

					<div class="form-group vestibulinho_item">
						<label class="vestibulinhoLabel">NET/TV Mês 3*</label>
						<input class="form-control vestibulinhoForm" type="text"  name="net_3" id="net_3" required />
					</div>

					<div class="form-group vestibulinho_item">
						<label class="vestibulinhoLabel">NET/TV Mês 3*</label>
						<input class="form-control vestibulinhoForm" type="text"  name="net_3" id="net_3" required />
					</div>

					<div class="form-group vestibulinho_item">
						<label class="vestibulinhoLabel">Aluguel*</label>
						<input class="form-control vestibulinhoForm" type="text"  name="aluguel" id="aluguel" required />
					</div>

					<div class="form-group vestibulinho_item">
						<label class="vestibulinhoLabel">Outros Gastos*</label>
						<input class="form-control vestibulinhoForm" type="text"  name="outros_gastos" id="outros_gastos" required />
					</div>

					<div class="form-group vestibulinho_item">
						<label class="vestibulinhoLabel">Observações*</label>
						<input class="form-control vestibulinhoForm" type="text"  name="obs" id="obs" required />
					</div>

					<div class="form-group vestibulinho_item">
						<div class="checkbox">
						<label class="vestibulinhoLabel">
							<input type="checkbox" id="confirma-edital"> Declaro que li e concordo com o <strong><a href="<?php echo VESTIBULINHO_CASD_EDITAL_LINK; ?>">edital do Vestibulinho</a></strong> <?php echo(date('Y')+1);?> e que todas as informações aqui preenchidas são verdadeiras, <strong>sob pena de exclusão do processo seletivo</strong>. 
						</label>
						</div>
					</div>
					<div class="alert alert-danger" id="alert-final"></div>
					<button class="btn btn-outline btn-block" type="submit">Submeter!</button>
				</form>
				<br>
			</div>
		</div>
	</section>
</div>