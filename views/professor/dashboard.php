<div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Painel de Controle 
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Página Pessoal do Professor
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <?php if(isset($this->falhaArquivo)){ if($this->falhaArquivo) {?>
            <div class="alert alert-danger" id="alert-final" style="color: red;">Falha no upload do arquivo! Tentar novamente!</div>
            <?php }} ?>
            
            <?php if(isset($this->messagePassword)) { ?>
            <div class="alert alert-danger" id="alert-password-1"  style="color: red;margin-top: 5px; display: none;"><?php echo $this->messagePassword;?></div>
            <?php } ?>

            <div class="row">
                <div class="col-sm-6">
                    <form id="profile-picture-change-form" enctype="multipart/form-data" action="<?php echo URL.'~'.$this->professorName;?>/dashboard" method="POST">
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2" style="background: white; padding: 30px; border-radius: 10px; margin-top: 15px;">

                        <div class="row">
                            <div class="image-crop">
                                <img src="<?php echo URL;?>images/professor_pic/<?php echo $this->professorName;?>.jpg">
                            </div>
                        </div>



                        <input type="hidden" name="photo-submitted" value="" />
                        <input type="hidden" name="xCanvas" value="" />
                        <input type="hidden" name="yCanvas" value="" />
                        <input type="hidden" name="heightCanvas" value="" />
                        <input type="hidden" name="widthCanvas" value="" />

                        <div class="row text-center"  style="margin-top: 40px;">
                            <div class="col-xs-4 col-xs-offset-4 text-center btn-group">
                                <label title="Carregar Foto" for="inputImage" class="btn btn-primary btn-block"  style="white-space: normal;">
                                    <input type="file" accept="image/*" name="picture" id="inputImage" class="hide" />
                                    Escolher Foto
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-4 col-xs-offset-4" style="margin-top: 40px;">
                            <button type="submit" name="submit" class="btn btn-primary btn-block full-width">Salvar</button>
                        </div>

                    </div>
                </div>
                <div class="col-sm-6">
                    <form method="POST" id="change-description">
                            <input type="hidden" value="" name="description-submitted">
                            <div class="form-group">
                                <label style="margin-top: 5px;">Nome Completo</label>
                                <input class="form-control" type="text" id="nome-completo"  name="nome-completo" value="<?php echo $this->info['nome']; ?>">
                            </div>
                            <div class="form-group">
                                <label style="margin-top: 5px;">Apelido</label>
                                <input class="form-control" type="text" id="apelido"  name="apelido" value="<?php echo $this->info['apelido']; ?>">
                            </div>
                            <div class="form-group">
                                <label style="margin-top: 5px;">Descrição</label>
                                <textarea class="form-control" name="descricao" rows="3" ><?php echo $this->info['descricao']; ?></textarea>
                            </div>
                        <div class="col-xs-4 col-xs-offset-4" style="margin-top: 40px;">
                            <button type="submit" name="submit" class="btn btn-primary btn-block full-width">Salvar</button>
                        </div>
                        </form>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-6">
                    <h2>Novo Recado</h2>
                    <form method="POST" id="novo-recado">
                            <input type="hidden" value="" name="recado-submitted">
                            <div class="form-group">
                                <label style="margin-top: 5px;">Título</label>
                                <input class="form-control" type="text" id="titulo-recado"  name="titulo" required>
                            </div>
                            <div class="form-group">
                                <label style="margin-top: 5px;">Recado</label>
                                <textarea class="form-control" name="recado" rows="3" required></textarea>
                            </div>
                        <div class="col-xs-4 col-xs-offset-4" style="margin-top: 40px;">
                            <button type="submit" name="submit" class="btn btn-primary btn-block full-width">Enviar</button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-6">
                    <h2>Novo Material</h2>
                    <form method="POST" id="novo-material" enctype="multipart/form-data">
                            <input type="hidden" value="" name="material-submitted">
                            <div class="form-group">
                                <label style="margin-top: 5px;">Nome do Material</label>
                                <input class="form-control" type="text" id="titulo-material"  name="titulo">
                            </div>
                            <div class="form-group">
                                <label style="margin-top: 5px;">Material</label>
                                <input class="form-control" type="file" id="arquivo" required name="arquivo" placeholder="Selecione Arquivo" />
                            </div>
                        <div class="col-xs-4 col-xs-offset-4" style="margin-top: 40px;">
                            <button type="submit" name="submit" class="btn btn-primary btn-block full-width">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-6">
                    <h2>Redefinir Senha</h2>
                    <form method="POST" id="nova-senha">
                            <input type="hidden" value="" name="senha-submitted">
                            <div class="form-group">
                                <label style="margin-top: 5px;">Senha Antiga</label>
                                <input class="form-control" type="password" id="senha-antiga"  name="senha-antiga" required>
                            </div>
                            <div class="form-group">
                                <label style="margin-top: 5px;">Senha Nova</label>
                                <input class="form-control" type="password" id="senha-nova"  name="senha-nova" required>
                            </div>
                            <label style="margin-top: 5px;">Confirmar Senha Antiga</label>
                                <input class="form-control" type="password" id="senha-nova-2"  name="senha-nova-2" required>

                            <div class="alert alert-danger" id="alert-password-1"  style="color: red;margin-top: 5px; display: none;">Senhas não são idênticas!</div>
                            <div class="alert alert-danger" id="alert-password-2"  style="color: red;margin-top: 5px; display: none;">Senha deve ter no mínimo 7 caracteres</div>

                            <div class="col-xs-4 col-xs-offset-4" style="margin-top: 40px;">
                            <button type="submit" name="submit" class="btn btn-primary btn-block full-width">Alterar</button>
                            </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
            <br>
            <br>
            <br>
            
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->