<h1>RAKETA TZ</h1>

<h3>Архитектура</h3>
<div>Проект разворачивается в докер-контейнерах</div>
<ul>
  <li>raketa-nginx - контейнер для NGINX, PORT - 8080, URL - localhost:8080</li>
  <li>raketa-fpm - контейнер для PHP-FPM</li>
  <li>raketa-cli - контейнер для PHP-CLI</li>
  <li>raketa-node - контейнер для NODEJS</li>
  <li>raketa-mysql - контейнер для MYSQL, PORT - 33061</li>
  <li>raketa-phpmyadmin - контейнер для PHPMYADMIN, PORT - 8686, URL - localhost:8686</li>
</ul>

<h3>Запуск</h3>
<div>
  Зайти в каталог проекта, и вызвать следующие команды по порядку
</div>
<code>
  make docker-build<br>
  make composer-update<br>
</code>
<div>Затем создать .env фаил</div>
<code>make laravel-env</code>
<div>Настроить Ларавель</div>
<code>
  make laravel-key <br>
  make laravel-storage<br>
  make perm<br>
</code>
<div>Настроить переменные окружения .env, поменять права на .env  если нет прав на изменение</div>
<code>
  DB_CONNECTION=mysql<br>
  DB_HOST=127.0.0.1<br>
  DB_PORT=3306<br>
  DB_DATABASE=app<br>
  DB_USERNAME=root<br>
  DB_PASSWORD=secret<br>
</code>

<div>Можно переходить к миграциям</div>
<code>
  make laravel-migrate
</code>

<div>Просеять БД фейк данными</div>
<code>
  make laravel-seed
</code>

<div>
  Маршрут для получения каталога - localhost:8080/api/products<br>
  method - GET<br>
  params - <br>
  <code>
    properties[option_id][] = value_id (properties[1][]=1&properties[1][]=2&properties[2][]=4
  </code>
</div>
