# Roadmap

# Phase 1 - Core Platform

## ApiPlatform

* Install ApiPlatform out of the box.
* Do not change the standard project structure unless necessary.
* Configure PostgreSQL.
* Configure Doctrine Migrations.
* Configure JWT authentication.
* Configure Swagger/OpenAPI.

---

## Local Development

Ensure the project can run:

* directly on a local machine;
* through Docker Compose;
* through Kubernetes.

The application should behave the same in all modes.

---

## Docker

Configure:

* PHP from the standard ApiPlatform Docker environment
* PostgreSQL
* RabbitMQ

Code changes must be available inside containers without rebuilding images.

---

## Kubernetes

Configure local Kubernetes:

* MicroK8s
* standard ApiPlatform HTTP entrypoint
* PostgreSQL
* RabbitMQ

Prepare Helm charts.

---

## Composer

Configure local Bundle integration through `api/composer.local.json`.
The main `api/composer.json` must contain only Composer package
dependencies; local path repositories must not be included in it.

Example:

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

The `api/composer.local.json` file and the contents of `bundles/` are used only for
local development and must be excluded from Git. Changes in a local
Bundle working copy should be reflected automatically in the main application.

---

# Phase 2 - Bundle Architecture

Create the directory structure:

```text
project/

├── api/
├── bundles/          # local working copies only, contents are gitignored
│   ├── AuthBundle/
│   ├── UserBundle/
│   ├── ArticleBundle/
│   ├── MediaBundle/
│   └── SeoBundle/
```

---

## Bundle Requirements

Each Bundle must:

* have its own namespace;
* have its own services;
* have its own ApiResources;
* have its own DTOs;
* have its own migrations;
* have its own tests.

---

## First Bundle

Implement:

### UserBundle

Contains:

* users;
* roles;
* access rights.

---

## Second Bundle

Implement:

### AuthBundle

Contains:

* JWT authentication;
* refresh token;
* session management.

---

# Phase 3 - CMS

Implement:

### ArticleBundle

* articles;
* categories;
* tags;
* publishing;
* drafts.

---

### MediaBundle

* file uploads;
* images;
* preview generation.

---

### SeoBundle

* meta title;
* meta description;
* slug;
* sitemap.

---

# Phase 4 - Preparing for Microservices

Prepare the architecture for extracting Bundles into separate services.

Requirements:

* no circular dependencies;
* minimal coupling;
* interaction through interfaces;
* interaction through events.

---

# Phase 5 - Microservices

Create separate applications:

```text
apps/

├── auth-service/
├── user-service/
├── article-service/
└── media-service/
```

Each application uses the corresponding Bundle as its main module.

---

# Definition of Success

The platform must allow:

1. Create a new project based on the standard ApiPlatform.
2. Connect the required Bundles through Composer.
3. Get a working application without changing the ApiPlatform core.
4. Run the project:

    * locally without Docker;
    * with Docker;
    * with Kubernetes.
5. When needed, extract a Bundle into a separate microservice without rewriting business logic.
