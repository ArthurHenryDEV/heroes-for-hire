# 🛡️ Hero for Hire - Stark Industries Initiative

*"Conectando civis em perigo aos maiores heróis da Terra. Uma iniciativa Stark Industries."*

## 📖 Sobre o Projeto

Este projeto é um Sistema de Gestão de Missões desenvolvido como requisito avaliativo da disciplina de **Programação Web**.

O sistema simula uma plataforma onde cidadãos podem solicitar ajuda em situações de perigo e super-heróis cadastrados podem aceitar e resolver essas missões. O projeto foi construído seguindo rigorosamente o padrão **MVP (Minimum Viable Project)**, sem o uso de frameworks de back-end ou front-end, utilizando apenas tecnologias nativas.

## 🚀 Funcionalidades

### 🏙️ Módulo Cidadão

- **Cadastro e Login:** Acesso seguro com persistência de dados via Sessão PHP.
- **Solicitação de Socorro:** Formulário interativo para descrever ameaças.
- **Algoritmo de Urgência (JS):** O sistema reage visualmente ao nível de ameaça selecionado (*Baixa, Média, Alta, Vingadores*).
- **Upload de Evidências:** Possibilidade de enviar fotos do local (armazenamento em disco e referência no banco).
- **Histórico:** Acompanhamento em tempo real do status do pedido (*Pendente, Em Andamento, Concluída*).

### 🛡️ Módulo Herói

- **Acesso Restrito:** Cadastro protegido por código de segurança da agência (**heroi123**).
- **Mural de Missões:** Visualização de todas as ameaças ativas com detalhes e fotos.
- **Gestão de Missões (CRUD):**
  - **Aceitar:** Muda o status para *Em Andamento*.
  - **Concluir:** Arquiva a missão e a remove do mural principal.
- **Arquivo Morto:** Histórico separado para missões já finalizadas (Persistência de dados **sem exclusão física**).

## 🛠️ Tecnologias Utilizadas

O projeto respeita as restrições do edital, não utilizando frameworks pesados (*Laravel, React, Vue*).

- **Back-end:** PHP 8+ (Puro, Estruturado)
- **Banco de Dados:** MySQL (Conexão via PDO para segurança)
- **Front-end:** HTML5, CSS3 (Bootstrap 5 + Tema Personalizado *"Stark Glassmorphism"*)
- **Interatividade:** Javascript (Vanilla JS)

## 🎨 Identidade Visual

Foi desenvolvido um tema exclusivo **"Stark Industries"**, focado em:

- **Dark Mode:** Para imersão e conforto visual.
- **Glassmorphism:** Elementos translúcidos imitando interfaces holográficas.
- **Acessibilidade:** Alto contraste em textos e feedbacks visuais claros.

## 🔧 Como Rodar o Projeto

### Pré-requisitos

- Servidor Local (**XAMPP, MAMP ou WAMP**)
- Navegador Web Moderno

### Passo a Passo

1. Clone este repositório na pasta **htdocs** (XAMPP) ou **www** (WAMP).
2. Crie um banco de dados MySQL chamado **hero_db**.
3. Importe o script SQL contido no arquivo **banco.sql** (ou execute os comandos de criação de tabelas).
4. Certifique-se de que a pasta **uploads/** existe na raiz e tem permissões de escrita.
5. Acesse em seu navegador:
   ```
   http://localhost/heroes-for-hire
   ```

## 👥 Autores

Projeto desenvolvido pela dupla:

- **[Arthur Henry Dias Paiva]**
- **[Luís Davi Silva Mendes]**

Desenvolvido para a disciplina de **Programação Web – 2025**.

## 📁 Estrutura Sugerida do Repositório

heroes-for-hire/
├─ banco.sql
├─ index.php
├─ login.php
├─ cadastro_cidadao.php
├─ cadastro_heroi.php
├─ dashboard_heroi.php
├─ uploads/                # evidências (imagens)
├─ css/
│  └─ stark-theme.css
├─ js/
│  └─ urgencia.js
└─ README.md
