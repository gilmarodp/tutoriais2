<?php require_once 'header.php';?>

		<script>
		var language = window.navigator.userLanguage || window.navigator.language;
		if(language == "pt-BR"){
		var bd='Backup do Banco (MySQL)';
		var host='Servidor *';	
		var user='Usuário *';
		var pass='Senha *';
		var name='Banco *';
		var required='Estes campos são requeridos.';
		}else{
		var bd='Database Backup (MySQL)';
		var host='Host *';
		var user='User *';
		var pass='Pass *';
		var name='Database *';
		var required='These fields are required.';
		}
		</script>        
    </head>
    <body>
    <div class="container">    
            <div class="row">            
	                <div class="col-lg-5 col-lg-offset-3">
                    <h1 align="center"><script>document.writeln(bd);</script></a></h1>
                    <form id="backup-for-all-form" method="post" action="./backup-db.php" role="form">
                        <div class="messages"></div>
                        <div class="controls">
                        
                            <div class="row" align="center">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_name"><script>document.writeln(host);</script></label>
                                        <input id="dbhost" type="text" class="form-control" name="dbhost" value="" placeholder="localhost" required="required" data-error="<script>document.writeln(hostp);</script>">                                        
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" align="center">                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_lastname"><script>document.writeln(user);</script></label>
                                        <input id="dbuser" type="text" name="dbuser" class="form-control" placeholder="root" required="required" data-error="<script>document.writeln(userp);</script>">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" align="center">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_email"><script>document.writeln(pass);</script></label>
                                        <input id="dbpass" type="password" name="dbpass" class="form-control" placeholder="Enter Pass" required="required" data-error="DB Pass is required *">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" align="center">                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_phone"><script>document.writeln(name);</script></label>
                                        <input id="database" type="text" name="database" class="form-control" placeholder="Enter database name" required="required" data-error="Database name is required *">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>                            
                            <div class="row" align="center">
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-success btn-send" name="send" value="Send">
                                </div>
                                <div class="col-md-12">
                                    <p class="text-muted"><strong>*</strong> <script>document.writeln(required);</script>
                                    <br><br>
                                    Contact form template by <a href="http://bootstrapious.com" target="_blank">Bootstrapious</a>.</p>
                                </div>
                            </div>
                        </div>

                    </form>
                </div><!-- /.8 -->
            </div> <!-- /.row-->
        </div> <!-- /.container-->

<?php require_once 'footer.php';?>
