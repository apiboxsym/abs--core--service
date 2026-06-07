# Changelog

## Unreleased

- Added bundle development rules to `docs/DEVELOPING.md`, including Symfony compliance and local Composer usage via `COMPOSER=composer.local.json composer install`.
- Updated the template rules to avoid creating local bundles by default and prepared the project for bundle-free base usage.
- Removed the default local bundles, their Docker integration, and their lock-file references from the base template.
