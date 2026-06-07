# Project Rules

- Backend: Symfony + ApiPlatform
- Frontend: separate project, not part of this repository
- Infrastructure: Kubernetes + Helm
- Local Kubernetes: MicroK8s
- Database: PostgreSQL
- Messaging: RabbitMQ

# Development Rules

- Use strict types
- Use DDD modules
- Use OpenAPI-first approach
- Use Helm for all deployments
- Avoid docker-compose in production
- Use PHPUnit for tests

# DevOps Rules

- All services must have healthchecks
- All containers must be non-root
- Use readiness/liveness probes
- Use standard ApiPlatform HTTP entrypoint

# Bundle Rules

- When creating a new bundle, always add `LICENSE`, `README.md`, `TODO.md`, and `CHANGELOG.md`.
- For bundle `LICENSE` files, use the MIT license by default.
- For new bundle `LICENSE` files, include: `apiboxsym <apiboxsym@gmail.com>` and `Anisimov Kostya <kostiaGm@gmain.com>`.
- When creating a new bundle, add bundle-specific documentation to its `README.md`.
- When creating a new bundle, add `TODO.md` and `CHANGELOG.md` in the bundle root.
- In bundle `CHANGELOG.md`, place the current date before the file title.
- When editing an existing bundle, update `README.md`, `TODO.md`, and `CHANGELOG.md` if the bundle behavior, structure, or scope changed.
