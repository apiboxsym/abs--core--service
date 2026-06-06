# Architecture

## Общая концепция

Проект строится на базе стандартного ApiPlatform.

ApiPlatform является основным приложением (Host Application).

Основная бизнес-логика должна находиться в отдельных Symfony Bundle.

Цель архитектуры — возможность использовать систему как:

* монолитное приложение;
* набор независимых микросервисов.

При этом бизнес-логика должна переиспользоваться без изменений.

---

## Структура проекта

```text
api-core/

├── bundles/          # только локальные рабочие копии Bundle, содержимое в .gitignore
│   ├── AuthBundle/
│   ├── UserBundle/
│   ├── ArticleBundle/
│   ├── MediaBundle/
│   └── SeoBundle/
│
├── api/
│   └── ApiPlatform Application
│
├── docker/
├── kubernetes/
└── docs/
```

---

## ApiPlatform

ApiPlatform используется без существенного изменения стандартной структуры.

Host Application отвечает за:

* запуск приложения;
* конфигурацию ApiPlatform;
* конфигурацию Doctrine;
* конфигурацию Security;
* подключение Bundle;
* инфраструктурную интеграцию.

В Host Application запрещено размещать бизнес-логику.

---

## Bundle

Каждый Bundle является независимым модулем.

Bundle может содержать:

* Entity;
* ApiResource;
* State Processor;
* State Provider;
* DTO;
* Validator;
* Service;
* Event;
* Migration;
* Console Command.

Каждый Bundle должен быть максимально независимым от остальных.

---

## Подключение Bundle

В основном `api/composer.json` Bundle подключаются как обычные Composer-пакеты.
Во время локальной разработки path repository подключаются только через
`api/composer.local.json`.

Пример:

```json
{
  "repositories": [
    {
      "type": "path",
      "url": "../bundles/*",
      "options": {
        "symlink": true
      }
    }
  ]
}
```

Файл `api/composer.local.json` и содержимое `bundles/` не должны попадать в Git.
Изменения в локальной рабочей копии Bundle должны автоматически отражаться в
основном приложении без публикации пакета.

---

## Namespace

Использовать namespace:

```php
MartenaSoft\AuthBundle
MartenaSoft\UserBundle
MartenaSoft\ArticleBundle
MartenaSoft\MediaBundle
```

---

## Подготовка к микросервисам

Каждый Bundle должен иметь возможность быть вынесенным в отдельный сервис.

При разработке необходимо соблюдать правила:

* минимальная связанность между Bundle;
* отсутствие циклических зависимостей;
* взаимодействие через интерфейсы и DTO;
* взаимодействие через события для асинхронных процессов.

---

## Работа в монолите

По умолчанию все Bundle подключаются в одно ApiPlatform приложение.

```text
ApiPlatform
    |
------------------------------------
| Auth | User | Article | Media |
------------------------------------
```

---

## Работа в микросервисах

При необходимости Bundle может быть вынесен в отдельное ApiPlatform приложение.

Пример:

```text
auth-service
    |
AuthBundle

article-service
    |
ArticleBundle
```

Бизнес-логика Bundle не должна изменяться при переносе.

---

## Основной принцип

Вся бизнес-логика находится в Bundle.

ApiPlatform используется как Host Application и слой взаимодействия с API.
