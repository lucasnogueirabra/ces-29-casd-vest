<div id="page-wrapper">
	<header id="header">
		<div class="container text-center">
			<h1>Prof. <?php echo $this->info['apelido'];?></h1>
		</div>
	</header>

	<section id="professor-info">
		<div class="container">
			<div class="row normal-margin">
				<div id="professor-foto" class="col-sm-3">
					<div class="img-container">
						<img src="<?php echo URL;?>images/professor_pic/<?php echo $this->professorName;?>.jpg" class="img-responsive img-circle">
					</div>
				</div>
				<div  class="col-sm-9">
					<h2 class="text-center"><?php echo $this->info['nome'];?></h2>
					<h4 id="descricao"><?php echo $this->info['descricao'];?></h4>
				</div>
			</div>
		</div>
	</section>

	<section id="content">
		<div class="container" id="separator"></div>
		<div class="container">
			<div class="row">	
				<div class="col-sm-6" id="recados">	
						<h2 class="text-center content-title">Recados</h2>
					<ul id="recados-list">
					<?php foreach ($this->info['recados'] as $title => $recado) {?>					
						<li class="recado">
							<p class="recado-content"> <strong><?php echo $title;?></strong>(<?php echo date('d/m/Y', strtotime($recado['date']));?>) - <?php echo $recado['content'];?> </p>
						</li>
					<?php } ?>
					</ul>
				</div>
				<div class="col-sm-6" id="material">
					<h2 class="text-center content-title">Materiais</h2>
					<ul id="materiais-list">
						<?php foreach ($this->info['materiais'] as $title => $material) {?>
							<li class="material">
								<a href="<?php echo URL.'~'.$this->professorName.'/downloadMaterial/'.$material['link'];?>"><i class="fa fa-download"></i>   <?php echo $title; ?></a>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</section>
</div>