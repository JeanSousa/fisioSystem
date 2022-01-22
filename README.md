<h1> Fisiosystem </h1>

![Screenshot_2021-10-12 Fisio System](https://user-images.githubusercontent.com/38965322/136943842-ba630f3e-8f9d-4780-be49-d0f1aeee2cd4.png)

> Status: Desenvolvimento ⚠️

### O Fisiosystem é uma aplicação web para gestão de pacientes da área de fisioterapia

### Funcionalidades 
+ Cadastro de Pacientes
+ Cadastro de Evolução de Pacientes
+ Relatório de Evoluçao de Pacientes

### Funcionalidades em desenvolvimento
+ Cadastro de Prontuário
+ Agendamento de pacientes 

## Tecnologias Utilizadas

<table>
  <tr>
      <td>PHP</td>
      <td>Laravel</td>
      <td>Composer</td>
      <td>Mysql</td>
  </tr>
  <tr>
      <td>7.3</td>
      <td>7.*</td>
      <td>2.1.8</td>
      <td>5.7</td>
  </tr>
</table>

## Como rodar a aplicação
#### Na raiz do projeto rode:
1) docker-compose up -d
2) docker exec -it fisiosystem_app_1 bash
3) chmod -R 777 storage
4) chmod -R 775 bootstrap/cache
5) composer install --no-scripts
6) cp .env.example .env
7) php artisan key:generate
8) php artisan migrate
9) php artisan storage:link 

### Endereços e portas

<table>
  <tr>
      <td>Projeto</td>
      <td>Banco de Dados</td>
  </tr>
  <tr>
      <td>http://localhost:8081/</td>
      <td>name: fisiosystem, porta: 3309, user: root, senha vazia</td>
  </tr>
</table>

Para registrar-se acesse a rota /register






