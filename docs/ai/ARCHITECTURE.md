# Architecture

## General Concept

The project is built on top of the standard ApiPlatform.

ApiPlatform is the main application (Host Application).

The core business logic must reside in separate Symfony Bundles.

The goal of the architecture is to make it possible to use the system as:

* a monolithic application;
* a set of independent microservices.

At the same time, the business logic must be reusable without changes.

---

## Project Structure

```text
api-core/

├── bundles/          # local Bundle working copies only, contents are gitignored
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

ApiPlatform is used without significant changes to its standard structure.

The Host Application is responsible for:

* application startup;
* ApiPlatform configuration;
* Doctrine configuration;
* Security configuration;
* Bundle integration;
* infrastructure integration.

Business logic must not be placed in the Host Application.

---

## Bundle

Each Bundle is an independent module.

A Bundle may contain:

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

Each Bundle must be as independent from the others as possible.

---

## Bundle Integration

In the main `api/composer.json`, Bundles are included as regular Composer packages.
During local development, path repositories are connected only through
`api/composer.local.json`.

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

The `api/composer.local.json` file and the contents of `bundles/` must not be committed to Git.
Changes in a local Bundle working copy should be reflected automatically in the
main application without publishing the package.

---

## Namespace

Use the following namespaces:

```php
MartenaSoft\AuthBundle
MartenaSoft\UserBundle
MartenaSoft\ArticleBundle
MartenaSoft\MediaBundle
```

---

## Preparing for Microservices

Each Bundle must be able to be extracted into a separate service.

The following rules must be followed during development:

* minimal coupling between Bundles;
* no circular dependencies;
* interaction through interfaces and DTOs;
* interaction through events for asynchronous processes.

---

## Working as a Monolith

By default, all Bundles are connected to a single ApiPlatform application.

```text
ApiPlatform
    |
------------------------------------
| Auth | User | Article | Media |
------------------------------------
```

---

## Working as Microservices

If needed, a Bundle can be extracted into a separate ApiPlatform application.

Example:

```text
auth-service
    |
AuthBundle

article-service
    |
ArticleBundle
```

The Bundle business logic must not change during extraction.

---

## Core Principle

All business logic resides in Bundles.

ApiPlatform is used as the Host Application and the API interaction layer.
