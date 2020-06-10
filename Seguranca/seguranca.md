# Segurança em servidor tipo VPS

https://www.youtube.com/watch?v=WXL37SjSs9g&feature=youtu.be&fbclid=IwAR10lnvZ6CHIN63fAvFi2c7R2pS52XyIRd2-8iXorkmibniDqJjByd0A0qI

- Acesso SSH com chave criptografada. Criar chave SSH no desktop usando a senha do desktop, copiar e colar a chave pública para o servidor
- fail2bn
- Desabilitar o acesso com root ao SSH
- Mudando a senha do SSH
- Desabilitar cache de senha do SSH
- Update e upgrade do sistema. Sempre a última versão LTS da distribuição
- Habilitando o firewall
- Verificando conexões ativas

Acessando

ssh root@IP -i ~/.ssh/chave_publica

Criar usuário

sudo adduser ribafs

Adicionar ao grupo sudo

sudo adduser ribafs sudo

Após reiniciar o SSH

Adicionar o novo user ao ssh

ssh-copy-id -i ~/.ssh/chave-publica.pub ribafs@IP

Bloquear acesso com root e com senha

Reiniciar ssh

Mudar porta do SSH

Reiniciar ssh

Acessar usando a porta

-p porta

Desabilitar acesso visual do SSH

Antes de habilitar firewall (que bloqueia acesso com o servidor)

Liberar acesso da porta SSH
```php
sudo ufw allow porta/tcp
sudo ufw enable
```
Um bom utilitário é o tilix (é um terminal que pode ser dividido na vertical ou horizontal)

sudo apt install tilix

Desativar ping ufw

Verificar conxões ativas

netstat -peanut

Para acesso externo somente a porta do ssh. 53, do DNS somente para consulta interna

Ver servido da Cloudflare com DDOS

