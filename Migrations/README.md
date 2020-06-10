# Migrations com Phinx

## O que são migration

São arquivos em php que podem tanto gerar a estrutura das tabelas quanto popular as tabelas com registros

## Algumas vantagens das migrations

- Como são arquivos em php podem entrar no controle de versão com Git (os bancos não entram)
- Servem de backup dos bancos
- Se você usa o SGBD MySQL e um dia você decidir migrar para o PostgreSQL a única coisa que precisará fazer é mudar a conexão, com bem poucas alerações como em paginação.

## Instalação (pacotes necessários)

Crie uma pasta por exemplo

/var/www/html/migracoes

- composer require robmorgan/phinx
- composer require symfony/yaml
- composer require fzaninotto/faker

Criar as pastas

db
    migrations
    
    seeds

## Criar arquivo de configuração phinx.yml

php vendor/bin/phinx init

Editar e ajustar phinx.yml
```php
paths:
    migrations: '%%PHINX_CONFIG_DIR%%/db/migrations'
    seeds: '%%PHINX_CONFIG_DIR%%/db/seeds'

environments:
    default_migration_table: phinxlog
    default_database: development
    production:
        adapter: mysql
        host: localhost
        name: 
        user: root
        pass: 'root'
        port: 3306
        charset: utf8

    development:
        adapter: mysql
        host: localhost
        name: testes
        user: root
        pass: 'root'
        port: 3306
        charset: utf8

    testing:
        adapter: mysql
        host: localhost
        name: testing_db
        user: root
        pass: ''
        port: 3306
        charset: utf8

version_order: creation
```
Vamos alterar entrando com os dados apenas para development
```php
    development:
        adapter: mysql
        host: localhost
        name: testes
        user: root
        pass: 'root'
        port: 3306
        charset: utf8
```
Importante: o nome das migrations precisa ser em CamelCase

## Criar uma migration

vendor/robmorgan/phinx/bin/phinx create Usuarios

Editar

db/migrations/20200609135520_usuarios.php
```php
<?php

use Phinx\Migration\AbstractMigration;

class MinhaMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {

    }
}
```
Alterar o change():
```php
public function change()
    {
        $this->table('users')
            ->addColumn('name', 'string')
            ->addColumn('email', 'string', [
            'null' => false
        ])
            ->addColumn('password', 'string', [
            'null' => false
        ])
            ->addColumn('active', 'boolean', [
            'null' => false,
            'default' => true
        ])
            ->addColumn('created', 'datetime',['default'=>'CURRENT_TIMESTAMP'])
            ->create();       
    }
```
## Executar a migration para criar a tabela:

php vendor/robmorgan/phinx/bin/phinx migrate -e development

## Outros comandos
php vendor/robmorgan/phinx/bin/phinx status -e development

Rolback, excluindo as tabelas

php vendor/robmorgan/phinx/bin/phinx rollback -e development

Usando SQL
```php
public function up()
	{
	    $this->execute("INSERT INTO users (name, email, password) VALUES
	     ('teste','teste@teste.com','senha_segura')");
	}
```

## Criar arquivo de Seed (cadastrando registros)

php vendor/bin/phinx seed:create Usuarios

Gerará:

db/seeds/Usuarios.php
```php
<?php

use Phinx\Seed\AbstractSeed;

class Usuarios extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {

    }
}
```
Editar e mudar assim:
```php
<?php
use Phinx\Seed\AbstractSeed;

class Usuarios extends AbstractSeed
{
    public function run()
    {
        $data = [
            [
                'name'    => 'João Brito',
                'email'    => 'joao@joao.com',
                'password'    => 'joao',
                'active'    => '1',
                'created' => date('Y-m-d H:i:s'),
            ],
            [
                'name'    => 'Pedro Brito',
                'email'    => 'pedro@joao.com',
                'password'    => 'pedro',
                'active'    => '0',
                'created' => date('Y-m-d H:i:s'),
            ]
        ];

        $posts = $this->table('users');
        $posts->insert($data)
              ->save();
    }
}
```
## Inserir os registros com seed na tabela:

php vendor/bin/phinx seed:run -e development


## Podemos usar o faker para inserir muitos registros de uma só vez com mais praticidade

```php
<?php

use Phinx\Seed\AbstractSeed;

class Usuarios extends AbstractSeed
{
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'name'      => $faker->userName,
                'password'      => sha1($faker->password),
                'email'         => $faker->email,
                'active'    => $faker->regexify('[01]'),
                'created'       => date('Y-m-d H:i:s'),
            ];
        }

        $this->insert('users', $data);
    }
}
```
## Gerando os registros

php vendor/bin/phinx seed:run -e development

## Relacionamentos/Foreign Key

[ForeignKey.txt](ForeignKey.txt)

## Comandos extras

[migrations-extras.txt](migrations-extras.txt)


## Dicas extras de seed

[seeds-cake3.txt](seeds-cake3.txt)


https://book.cakephp.org/phinx/0/en/index.html
https://coderwall.com/p/v3qg2q/complex-database-migrations-with-php-mysql-using-phinx

