# Development Rules

## Namespace

Use:

MartenaSoft\*Bundle

Examples:

- MartenaSoft\UserBundle
- MartenaSoft\AuthBundle
- MartenaSoft\ArticleBundle

## Code

- strict_types=1
- DTOs for data exchange
- Thin controllers
- Business logic only in services and domain objects
- Test coverage is mandatory

## Architecture

Forbidden:

- Fat Controllers
- Service Locator
- Direct links between packages through Doctrine
- Circular dependencies

Allowed:

- Interfaces
- Events
- Messenger
- Contracts
