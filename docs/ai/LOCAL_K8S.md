# Local Kubernetes Runtime

The local runtime is Docker Desktop Kubernetes plus Helm. Do not use docker-compose networking as the primary runtime.

## Prerequisites

- Docker Desktop is running.
- Docker Desktop Kubernetes is enabled.
- `kubectl`, `helm`, and `make` are installed.
- Current project dependencies exist in `backend/vendor`.

## Start pods locally

```bash
make k8s-up
```

This command:

- builds `api-core-api:dev` from `backend/Dockerfile`;
- installs or upgrades `ingress-nginx`;
- installs or upgrades the `api-platform-dev` Helm release;
- starts API, PostgreSQL, and Redis pods in `api-platform-dev`;
- waits for the API deployment rollout.

## Check status

```bash
make k8s-status
```

## Check health endpoint inside Kubernetes

```bash
make k8s-health
```

Expected response:

```json
{"status":"ok"}
```

## Check PostgreSQL and Redis

```bash
make k8s-db-ready
```

Expected responses:

```text
127.0.0.1:5432 - accepting connections
PONG
```

## View API logs

```bash
make k8s-logs
```

## Restart after backend code changes

```bash
make k8s-restart
```

This rebuilds the local image, upgrades the Helm release, restarts the API deployment, and waits for rollout.

## Stop local pods

```bash
make k8s-down
```

To remove the namespace and PVCs as well:

```bash
make k8s-clean
```

## Local ingress

The dev values use:

```text
api.localhost
```

If Docker Desktop does not expose the ingress load balancer directly, use port-forward:

```bash
kubectl --context docker-desktop -n ingress-nginx port-forward svc/ingress-nginx-controller 8080:80
curl -H 'Host: api.localhost' http://127.0.0.1:8080/healthz
```
