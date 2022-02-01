Разработано с помощью Yii 2
-------------------

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      components/         вынесен некоторый функционал в отдельные компоненты
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources

REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 7.4.0.

### Install with Docker
Start the container

    docker-compose up -d
    
You can then access the application through the following URL:

    http://127.0.0.1:8000

Создайте через PhpMyAdmin бд test_proj_db и накатите миграций yii create

Помимо докера, можно запускать и в OpenServer

Описание задания
------------
Используя модель MVC фреймворка YII2 сделать счетчик уникальных посещений страниц зарегистрированными пользователями с сохранением данных о времени посещения, ip-адресе и ссылки на идентификатор пользователя с отображением данных статистики в отдельной таблице с возможностью фильтрации и поиска по этим трем указанным выше полям.
Время решения и сдачи результатов теста: 4 рабочих часа.
Приемлемый - с точки зрения прохождения кандидата - результат решения задачи: YML - composer  + файлы проекта (модели, контролеры, виды) + миграция базы данных + комментарии для разворачивания проекта при тестировании если автор считает необходимым их дать.