# 📝 Sistema de Cadastro de Cidadãos com NIS

Um sistema PHP para cadastro de cidadãos com geração automática de NIS (Número de Identificação Social) conforme especificado no desafio.

## 🚀 Funcionalidades

- ✅ Cadastro de cidadãos com nome
- ✅ Geração automática de NIS de 11 dígitos
- ✅ Consulta de cidadãos por NIS
- ✅ Arquitetura limpa com separação MVC
- ✅ Testes unitários e de integração

## 🛠️ Pré-requisitos

- PHP 8.0+
- Composer
- PostgreSQL 12+ (ou outro banco de dados compatível com PDO)
  
**Extensões PHP necessárias:**
- pdo_pgsql
- pgsql 
- mbstring

⚠️Lembrando que é necessário habilitar as extenções no seu arquivo php.ini⚠️

## 🔧 Instalação

1. Clone o repositório:
```bash
git clone [URL_DO_REPOSITORIO]
cd desafiogesuas
```
Agora dentro do diretório do projeto

2. Instale as dependências:
```bash
composer install
```
3. Crie um banco de dados postgres e rode a seguinte query:

```bash
CREATE TABLE people (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    nis VARCHAR(11) UNIQUE NOT NULL
);
```

4. Configure o ambiente:
```bash
cp .env.example .env
```
Edite o .env com suas credenciais de banco de dados.

## 🏃 Executando a Aplicação
1. Inicie o servidor PHP:

```bash
php -S localhost:8000 -t public
```
2. Acesse no navegador:

```bash
http://localhost:8000
```
## 🧪 Executando Testes

```bash
composer test
```
## 🧠 Padrões e Tecnologias Utilizadas
- POO: Programação Orientada a Objetos

- MVC: Model-View-Controller

- PSR-4: Autoloading de classes

- PHPUnit: Testes automatizados

- PDO: Acesso a banco de dados

- Composer: Gerenciamento de pacotes
