# Development Rules

## Namespace

Использовать:

MartenaSoft\*

Примеры:

- MartenaSoft\User
- MartenaSoft\Auth
- MartenaSoft\Article

## Код

- strict_types=1
- DTO для обмена данными
- Тонкие контроллеры
- Бизнес-логика только в сервисах и доменных объектах
- Покрытие тестами обязательно

## Архитектура

Запрещено:

- Fat Controllers
- Service Locator
- Прямые связи между пакетами через Doctrine
- Циклические зависимости

Разрешено:

- Интерфейсы
- События
- Messenger
- Контракты
