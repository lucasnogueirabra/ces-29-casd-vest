<div id="page-wrapper">
	<header id="header">
		<div class="container text-center">
			<h1>Nossos Professores</h1>
		</div>
	</header>
	<br>
	<br>
	<section id="foto-descricao">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<h2 class="text-center prof-content-title">Os Nossos Heróis Anônimos</h2>
					<p class="prof-content-p">
						O Curso Santos Dumont não seria possível sem a existência deles. Professores voluntários que dedicam várias horas de sua semana para poder realizar o sonho de nossos alunos.
					</p>
					<p class="prof-content-p">
						Hoje contamos com uma equipe de quase 60 de professores, entre o CASD Vestibulares e o Casdinho, que dão milhares de aulas anuais. Cada um deles, com suas mais diferentes histórias de vida, são capazes de deixar um pouco de si em nossos alunos, enquanto os encaminham à aprovação.
					</p>
					<p class="prof-content-p">
						A cada ano, alguns professores se juntam ou tem que sair a nossa equipe. Entretanto, todos têm a certeza de fazer parte dessa grande família realizadora de sonhos que é o Curso Santos Dumont!
					</p>
				</div>
				<div class="col-sm-6">
					<div class="img-container">
						<img src="<?php echo URL;?>images/professores.jpg" class="img-responsive" />
						<h4 class="legendaImagem">Professores durante Auloween 2017</h4>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<section id="professores">
		<div class="container">
			<div class="row">
				<h2 class="text-center">Veja Nossos Professores!</h2>
			</div>
			<br>
			<br>
			<div class="row">
				<?php foreach ($this->profByMateria as $value) { ?>
				<div class="col-sm-6 prof-panel">	
					<a class="trigger">
						<div class="materia-header">	
							<h4><?php echo $value['materia'];?></h4>
						</div>
					</a>
					<ul class="trigged prof-list" style="display: none;">
						<?php foreach ($value['professores'] as $prof) { ?>
						<a href="<?php echo URL.'~'.$prof['username'];?>"><li class="prof-name"><?php echo $prof['name'];?></li></a>
						<?php } ?>
					</ul>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
</div>