<div id="page-wrapper">
	<div id="header">
		<h1 class="text-center">Documentos para o Vestibulinho <?php echo $this->documentos;?></h1>
	</div>
	<br>
	<br>
	<div class="container">
		<div class="col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0" id="provas-container">
			<h3 class="text-center">Edital</h3>
			<li class="item-provas"><a href="<?php echo URL.'vestibulinho/downloadEdital'.$this->documentos;?>"><i class="fa fa-file-pdf-o item-provas-icon" aria-hidden="true"></i>Edital</a>	</li>
			<hr>
			<h3 class="text-center">Documentos Entrevista Socioeconômica</h3>
			<?php
				foreach ($this->files as $file) 
				{
					echo '<li class="item-provas"><a href='.URL.'vestibulinho/downloadDocumentos'.$this->documentos.'/'.rtrim($file, '.pdf').'><i class="fa fa-file-pdf-o item-provas-icon" aria-hidden="true"></i> '.$file.'</a></li>';
					
				}
			?>
		</div>
	</div>
</div>
