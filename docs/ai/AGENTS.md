# Project Rules

- Backend: Symfony + ApiPlatform
- Frontend: Next.js
- Infrastructure: Kubernetes + Helm
- Local Kubernetes: MicroK8s
- Database: PostgreSQL
- Cache: Redis
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
- Use ingress-nginx