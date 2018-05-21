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
                            <i class="fa fa-dashboard"></i> Controle de Professores
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <?php if(isset($this->massage)) { ?>
            <div class="alert alert-danger" id="alert-password-1"  style="color: red;margin-top: 5px; display: none;"><?php echo $this->messagePassword;?></div>
            <?php } ?>

            <div class="row">
                <div class="col-sm-6">
                    <h2>Criar Novo Professor</h2>
                    <form method="POST" id="novo-prof">
                            <input type="hidden" value="" name="prof-submitted">
                            <div class="form-group">
                                <label style="margin-top: 5px;">Nome</label>
                                <input class="form-control" type="text" id="nome"  name="nome" required>
                            </div>
                            <div class="form-group">
                                <label style="margin-top: 5px;">Username (deve ser único entre todos os professores e e conter somente letras minúsculas)</label>
                                <input class="form-control" type="text" id="username"  name="username" required>
                                <div class="alert alert-danger" id="alert-username"  style="color: red;margin-top: 5px; display: none;">Deve conter somente letras minúsculas!</div>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Matéria:</label>
                                <select class="form-control" id="materia" name="materia">
                                <?php foreach ($this->materias as $value) {
                                    echo '<option value="'.$value['id'].'">'.$value['name'].' - '.(($value['curso'] == CASD)?'CASD Vest':'Casdinho').'</option>';
                                }  ?>
                                
                                </select>
                            </div>
                            <div class="form-group">
                                <label style="margin-top: 5px;">Senha</label>
                                <input class="form-control" type="password" id="senha"  name="senha" required>
                            </div>
                            <label style="margin-top: 5px;">Confirmar Senha</label>
                                <input class="form-control" type="password" id="senha-2"  name="senha-2" required>

                            <div class="alert alert-danger" id="alert-password-1"  style="color: red;margin-top: 5px; display: none;">Senhas não são idênticas!</div>
                            <div class="alert alert-danger" id="alert-password-2"  style="color: red;margin-top: 5px; display: none;">Senha deve ter no mínimo 7 caracteres</div>

                            <div class="col-xs-4 col-xs-offset-4" style="margin-top: 40px;">
                            <button type="submit" name="submit" class="btn btn-primary full-width">Alterar</button>
                            </div>
                    </form>
                </div>
                <div class="col-sm-6">
                    <h2>Lista de Professores</h2>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Nome</th>
                            <th>Username</th>
                            <th>Matéria</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($this->profInfo as $value) { ?>
                            <tr>
                            <td><?php echo $value['name'];?></td>
                            <td><?php echo $value['username'];?></td>
                            <td><?php echo $value['materia'].' - '.(($value['curso']==CASD)?'CASD Vest': 'Casdinho');?></td>
                            </tr>
                          <?php } ?>
                        </tbody>        
                    </table>
                    <!--<form action="">
                        <div class="col-xs-4 col-xs-offset-4" style="margin-top: 40px;">
                            <button class="btn btn-primary full-width" id="deletar-trig">Deletar todos professores?</button>
                        </div>
                        <div class="col-xs-4 col-xs-offset-4" id="deletar-prof" style="margin-top: 40px; display: none">
                                <button type="submit" name="submit" class="btn btn-primary full-width">Deletar todos professores?</button>
                        </div>
                    </form>-->
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