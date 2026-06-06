# ApiCode Platform

## Project Goal

Create a platform based on ApiPlatform for building CMS and business applications.

The platform must support two operating modes:

1. Monolithic application.
2. A set of independent microservices.

The transition from a monolith to microservices must be possible without rewriting business logic.

## Core Principles

- Business logic is implemented in separate modules (packages).
- ApiPlatform acts as the host application.
- Each module must be able to work:
  - inside a monolithic application;
  - inside a separate microservice.
- Modules must have minimal coupling with one another.
- All new projects should be assembled from ready-made modules.

## Core Platform Modules

- Auth
- User
- Article
- Media
- SEO
- Notification

## Infrastructure Goal

Provide a consistent development and application startup process:

- locally without Docker;
- locally with Docker;
- locally with Kubernetes;
- on remote servers with Docker;
- on remote servers with Kubernetes.

Application behavior should be as consistent as possible across all environments.

## Goal of Using AI

Use Codex and other AI tools for:
- module design;
- code generation;
- refactoring;
- testing;
- architecture analysis;
- documentation maintenance.
