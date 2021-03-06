# "Class 'aqui o nome da sua classe' not found" error

De tanto esta mensagem aparecer eu cheguei a pensar em abandonar o uso de namespace e voltar para os requires. Mas eu resolvi fazer uma boa pesquisa e anotar algumas observações que eu sabia que poderiam causar isso. E resultou neste documento que resolvi compartilhar no GitHub. Bem, conhecendo melhor sobre namespace estas mensagens parecerão em menor quantidade.

Quando se está usando o autoload com psr-4 e composer precisamos ficar atentos a alguns detalhes, que algumas vezes resulta na mensagem de erro:

Fatal error: Uncaught Error: Class '\App\Controllers\ClientesController()' not found in ... line 18

Esta é particularmente a minha classe: \App\Controllers\ClientesController()

## Algumas Possibilidades para solucionar o erro e também algumams dicas:
- Verifique es está importando o vendor/autoload

	require_once 'vendor/autoload.php';
- Verificar com cuidado o namespace completo da classe que está acusando erro
- Verificar o composer.json, o path dos namespaces na seção autoload com psr-4, se for o caso. Aqui está assim:
	- "App\\": "App/",
	- "Core\\": "Core/"
  
	Namespace usa duas barras \\ contrárias. Diretórios usam apenas uma barra /
- Verificar permissões de arquivos em sistemas UNIX
- Verifique se o namespace está declarado na classe que não está sendo encontrada
- Lembre de a cada alteração do composer.json executar:
	composer dumpautoload
	E por segurança, em caso de problemas execute
-	Somente podemos usar/importar

		use App\Controller\ClientesController;

    De uma classe que tenha o namespace definido.
- Verifique atentamente o case dos diretórios e namespace, especialmente se seu sistema não é case sensitivo.
- Eu estava recebendo o erro de classe not found aqui, depois descobri, que eram os parênteses ao final

	$default = '\\App\\Controllers\\'.ucfirst(DEFAULT_CONTROLLER).'Controller()';		

  Após remover os parênteses o erro desapareceu	    

## Algumas dicas

### Verifique se o arquivo existe. Exemplo:
```php
if(file_exists('App/Controllers/ClientesController.php')){
	print 'sim';		    
}else{
	print 'nao';
}
exit;
```
### Testar se a classe existe. Exemplo:
```php
if(class_exists('\\App\\Controllers\\ClientesController')){
	print 'sim';		    
}else{
	print 'não';
}
exit;
```
## Exemplo bem definido de criação de instância com namespace

$clientes = new \App\Controllers\ClientesController();

## Lembre que as barras do namespace são o contrário das de diretórios:

use Core\Controller\ClientesController;

Diretório: Core/Controllers/ClientesController

Dica: para ajudar sempre crie os namespaces idênticos aor diretórios, como:
- "App\\": "App/",
Isso facilita a memorização.

## Outra dica:

Ao usar um require ou include precisamos incluir a extensão .php ao final.
- require_once 'Core/Controllers/ClientesController.php';

Ao usar namespace o use não inclue a extensão:
- use Core\Controller\ClientesController;

Podemos instanciar uma classe diretamente através do seu namespace:

$cli = new Core\Controller\ClientesController;

E também podemos criar uma string com seu namespace:

$default = 'App\\Controllers\\ClientesController';

$cli = new $default;

## Observação sobre o dumpautoload -o

Fui dar uma olhada e traduzi a documentação. Veja o que entendi e parece fazer sentido: usando -o o composer otimiza para um carregamento mais rápido das classes.

Veja:
Se você precisar atualizar o carregador automático devido a novas classes em um pacote de mapa de classes, por exemplo, poderá usar o dump-autoload para fazer isso sem precisar passar por uma instalação ou atualização.

--optimize (-o): Converta o carregamento automático PSR-0/4 em mapa de classe para obter um carregador automático mais rápido. Isso é recomendado especialmente para produção, mas pode demorar um pouco para ser executado, portanto, atualmente não é feito por padrão.

Então, em minha opinião agora, vale a pena sempre usara -o.
Valeu Breno, na PHP Brasil.


## Referência
https://dev.to/dechamp/php---how-to-fix-class--not-found-error-1gp9	
