## ApiCore development

The API application lives in `api/`. Bundle packages are normal Composer
dependencies. During local development only, matching working copies may be
placed under `bundles/*Bundle` and exposed to Composer through
`api/composer.local.json`.

`api/composer.local.json` is intentionally local-only and ignored by Git. Use
`api/composer.local.json.dist` as the template when preparing a new workstation.
The contents of `bundles/` are also ignored; after development the bundles are
expected to live in separate repositories and be installed through Composer.

### Local machine

Requirements: PHP 8.4, Composer, Symfony CLI and PostgreSQL.

```sh
cd api
composer install
symfony serve -d
```

The local default database URL is:

```text
postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=16&charset=utf8
```

Open the API documentation at `https://127.0.0.1:8000/docs/` or
`http://127.0.0.1:8000/api/`, depending on the Symfony CLI URL.

### Docker

```sh
docker compose up --build
```

The development compose file bind-mounts `api/` and local `bundles/` working
copies, so changes made in the editor are visible inside the containers without
rebuilding.

### Kubernetes

For local Kubernetes development, use Skaffold with the bundled Helm chart:

```sh
cd helm
skaffold dev
```

Skaffold builds the development API image from the repository root so
`api/composer.local.json` and local `bundles/` working copies are available
during the image build. File sync is enabled for `api/` and local `bundles/`.

For a regular Helm deployment:

```sh
helm dependency update helm/api-platform
helm upgrade --install api-platform helm/api-platform -f helm/skaffold-values.yaml
```

## Install

[Read the official "Getting Started" guide](https://api-platform.com/docs/distribution/).

## Credits

Created by [Kévin Dunglas](https://dunglas.fr). Commercial support is available at [Les-Tilleuls.coop](https://les-tilleuls.coop).
