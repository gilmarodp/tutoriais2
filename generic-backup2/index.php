<?php require_once 'header.php'; ?>

		<script>
		var language = window.navigator.userLanguage || window.navigator.language;
		if(language == "pt-BR"){
		var forall='Backup Genérico';
		var filesdb='Backup de arquivos no formato zip e do banco em sql';
		var desc='Este aplicativo gera backup para seu software em PHP, Java, Ruby, Python ou para qualquer linguagem, também para CMS (Joomla, Wordpress, Drupal, Grav, etc), como também para Frameworks (CakePHP, Zend, Laravel, etc) ou para qualquer software que deseje. Baixe uma cópia para seu desktop e mantenha uma cópia no servidor, na sub pasta backup. Use com cuidado e apenas internamente, pois não tem controle de acesso. O subdiretório "backup" requer permissão de escrita para o Apache';
		var dbmy='Backup para Bancos MySQL';
		var files='Backup de Arquivos';
		}else{
		var forall='Generic Backup';
		var filesdb='Backup files in zip package and/or database in sql file.';
		var desc='This software make backup to your software in PHP, Java, Ruby, Python or any language, CMS (Joomla, WordPress, Drupal, Grav, etc), applications (CakePHP, Zend, Laravel, etc) or any software. Download to your desktop and keep a copy in server sub folder backup (require write permission to Apache).';
		var dbmy='Backup for MySQL Database';
		var files='Backup Files';
		}
		</script>        
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                <br><br>
                    <h1 align="center"><script>document.writeln(forall);</script></a></h1>
                    <p class="lead"><script>document.writeln(filesdb);</script></p>
                    <p class="lead"><script>document.writeln(desc);</script></p>

				<div align="center">
				<table border="0">
				<tr><td><h2><a href="form_db.php">- <script>document.writeln(dbmy);</script></a></h2></td></tr>
				<tr><td><h2><a href="form_files.php">- <script>document.writeln(files);</script></a></h2></td></tr>
				</table>
				</div>

                </div><!-- /.8 -->
            </div> <!-- /.row-->
        </div> <!-- /.container-->
        
<?php require_once 'footer.php'; ?>
