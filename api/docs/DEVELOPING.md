# Developing

## Bundle Rules

1. Do not create local bundles by default in this project template.
2. Create a Symfony bundle only when a project explicitly requires one.
3. Any bundle that is introduced must follow Symfony bundle requirements and conventions.
4. If a project uses local bundle development, use the local Composer configuration:

```bash
COMPOSER=composer.local.json composer install
```
