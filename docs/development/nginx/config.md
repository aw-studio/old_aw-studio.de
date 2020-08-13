# Nginx Config

## Change default Site

In the config file change from this:

```json
server {
    ...
    listen 80;
    listen [::]:80;
}
```

to this:

```json
server {
    ...
    listen 80 default_server;
    listen [::]:80 default_server;
}
```

## Set Upload Size

```json
server {
    ...
    client_max_body_size 100M;
}
```

## Static File Caching

```json
server {
    ...
    location ~*  \.(jpg|jpeg|png|gif|ico|mp4)$ {
        expires 30d;
    }
}

```

::: warning
Don't cache `js` and `css` when using Fjord.
:::
