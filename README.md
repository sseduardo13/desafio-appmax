# Desafio Appmax

### Pré-requisitos
- Docker instalado e rodando
- Todos os contễineres rodando na máquina deverão estar parados

### Instalação:
```bash
# Clona o projeto deste repositório
$ git clone https://github.com/sseduardo13/desafio-appmax.git

# Acessar a pasta do projeto
$ cd desafio-appmax

# Instalar o projeto
$ docker run --rm --interactive --tty --volume $PWD:/app composer install

# Renomear o arquivo .env.example
$ mv .env.example .env

# Executar o docker (sail)
$ ./vendor/bin/sail up
```
- Em outra aba do terminal executar:
```bash
# Gerar a chave encriptada para o projeto
$ ./vendor/bin/sail artisan key:generate

# Aplicar configurações do arquivo .env
$ ./vendor/bin/sail artisan config:cache

# Instalar as bibliotecas do projeto
$ ./vendor/bin/sail npm install
```
- Manter aberto o terminal durante a execução, para finalizar a execução utilize as teclas Ctrl + C.

### Execução:
- A cada nova execução deverá ser utilizado o comando abaixo dentro da pasta do projeto
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
- Na localhost no canto superior direito, clique em Registrar, após efetuado seu cadastro você será redirecionado para a página inicial
- Em um segundo acesso basta clicar em Log In e preencher seus dados de cadastro
- Para sair do sistema clique sobre seu nome e no menu dropdown clique em Log Out

### Tecnologias utilizadas
- Laravel: 8
- PHP: 8
- MySql: 8
