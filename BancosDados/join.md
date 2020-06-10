# JOIN, LEFT JOIN

Voce tem tabela1 e tabela2
```sql
tabela1
id int pk
nome varchar
email varchar
empresa int
```

tabela2
```php
id int pk
empresa varchar
cargo varchar
```php
O sql seria assim

SELECT * FROM tabela1 LEFT JOIN tabela2 ON tabela2.id = tabela1.empresa

```sql
CREATE TABLE pai (
 id SMALLINT PRIMARY KEY,
 nome_pai VARCHAR(50)
);

CREATE TABLE filho (
 id SMALLINT AUTO_INCREMENT PRIMARY KEY,
 nome_filho VARCHAR(50),
 pai_id SMALLINT,
 CONSTRAINT fk_id_pai FOREIGN KEY (pai_id)
 REFERENCES pai(id)
 ON DELETE CASCADE
 ON UPDATE CASCADE
);

INSERT INTO pai VALUES (1,'João'), (2,'Mário'), (3,'Renato'), (4,'Emerson'), (5,'André');
INSERT INTO filho (nome_filho, pai_id) VALUES ('João',1), ('Mário',1), ('Renato',3), ('Emerson',4), ('André',3);

SELECT p.pai_id, p.nome_pai, f.id, f.nome_filho
FROM filho f
INNER JOIN pai p
ON f.pai_id = p.id;

DELETE FROM filho
WHERE nome_filho = 'Renato';

Ao excluirmos o filho Renato, seu pai, que também se chama Renato, continuará a existir na tabela de pais

SELECT nome_pai, nome_filho
FROM filho
INNER JOIN pai
ON filho.pai_id = pai.id;
```
