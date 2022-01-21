# DIO_MailMass
## Script PHP para preparo e envio de e-mails em massa. Projeto Treino de GIT da DIO

O referido projeto permite o envio de e-mail em massa para um grupo de usuários listados em CSV (separados por ponte e vírgula).

Os principais requisitos do projeto são:

- Ler um arquivo CSV limitado (a ser determinado futuramente)
- Validar se o CSV possui um campo email;
- Tratar e determinar previamente os dados do CSV limitados até 15 tipos de dados;
- Exibir os dados do CSV lido para seleção dos mesmos que serão utilizados;
- Ter um ambiente para a construção de template do e-mail com os dados necessários;
- Visualizar o template antes de enviar;
- Enviar e-mails seguindo uma programação pré-determinada.


## Exemplo de dados do CSV

CPF;Nome;telefone;email;margem;apelido
1;Rafael;911427;rafael@teste.com.br;"1,5";Rafa
2;Daniel;654651;daniel@teste.com.br;"0,5";Dan
3;Thiago;913227;thiago@teste.com.br;"5,5";Thiago