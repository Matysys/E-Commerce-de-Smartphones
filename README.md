# E-commerce de Smartphones
Projeto para a faculdade na disciplina de Programação Web. Um sistema Web simulando um e-commerce de smartphones.
Esse projeto tem o Backend e Frontend juntos, isso é, ele não faz requisições para APIs externas. Esse projeto cria uma página HTML dinâmica com o uso do PHP, e foi usado numa disciplina do curso de Análise e Desenvolvimento de Sistemas. O nome correto de renderização dessa tecnologoa é **Server-Side Rendering**.

# Tecnologias usadas
- [X] HTML
- [X] CSS
- [X] PHP Vanilla
- [X] MySQL
- [X] JavaScript
- [X] Bootstrap 4
- [X] Composer

# Como acessar?
Anteriormente o projeto estava hospedado na Web numa hospedagem gratuita, mas não está mais. Recomendo que baixe o repositório e reproduza por um servidor web. Você pode fazer um clone do repositório se quiser também. Há um arquivo .SQL para você importar no seu banco de dados MySQL.
Esse projeto não funciona como esperado em ```localhost``` porque não é possível mandar e-mails, então você também pode hospedar em algum provedor gratuito como o 000webhost.

# O que há nesse projeto?
- Página inicial que se altera de acordo com o usuário
- Página de Cadastro
- Página de Login
- Página de Fale Conosco
- Página de recuperação de senha
- Página para alterar a foto de perfil
- Página para consultar os produtos disponíveis
- Página para fazer um pedido
- Página para consultar os pedidos feitos
- Página RESTRITA para o administrador para controlar o estoque (adicionar/remover) e alterar o preço
- Página RESTRITA para o administrador consultar os usuários
- Página RESTRITA para o administrador consultar os pedidos de cada usuário e aceitar
- Página RESTRITA que mostra um gráfico com as vendas gerais de smartphones

# O que é esse projeto?
Esse projeto é um simulador de uma loja virtual de smartphones (da qual eu usei a minha criatividade). O sistema de login está mais aprimorado, embora não esteja ainda 100% livre de falhas, ele está ainda mais aprimorado do que a aplicação anterior que eu criei, como exemplo, as senhas agora são criptografadas no Banco de Dados.
Há vários produtos disponíveis com um estoque determinado, é possível consultar os produtos em algumas ordens, como do menor preço ao maior, do maior estoque ao menor, em um intervalo de preços e etc... É necessário um cadastro com foto, ativar o cadastro na mensagem enviada para o email do usuário e fazer o login para começar a fazer o seu pedido. O pedido fica guardado na aba "Meus pedidos" e o estoque é retirado automaticamente do Banco de Dados a cada pedido feito.


