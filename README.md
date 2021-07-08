# Desafio Appmax

### Pré-requisitos
- Necessário ter o Docker instalado e rodando
- Para a instalação e execução todos os contễineres deverão estar parados

### Instalação:
```bash
# Clona o projeto deste repositório
$ git clone https://github.com/sseduardo13/desafio-appmax.git

# Acessa a pasta do projeto
$ cd desafio-appmax

# Executa o docker (sail)
$ ./vendor/bin/sail up

# O servidor iniciará como localhost - acesse http://localhost
```
- Manter aberto o terminal durante a execução, para finalizar a execução utilize as teclas Ctrl + C.

- Em outra aba do terminal execute:
```bash
 # Instala as bibliotecas do projeto
 $ ./vendor/bin/sail npm install
 ```

### Execução:
- Para execução utilize o comando abaixo dentro da pasta do projeto
```bash
 $ ./vendor/bin/sail up
 ```
- Manter aberto o terminal durante a execução, para finalizar a execução utilize as teclas Ctrl + C.
### API:
A API possui dois endpoints no método POST:
- Adicionar produtos ao estoque: 
  - Endereço: localhost/api/adicionar-produtos 
  - O JSON para envio da requisição deverá conter o SKU do produto e quantidade (sku, amount)
- Baixar produtos do estoque:
  - Endereço: localhost/api/baixar-produtos
  - O JSON para envio da requisição deverá conter o SKU do produto, a quantidade e o cliente (sku, amount, client)
### Acesso
<p>Login: </p>
<p>Senha: </p>

### Tecnologias utilizadas
- Laravel: 8
- PHP: 8
- MySql: 8