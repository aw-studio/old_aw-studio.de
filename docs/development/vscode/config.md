# VSCode Config

## Setup

-   install VSCode
-   install extension `Settings Sync`
-   import public GIST: `fe39070bba8f828dd8815b300c3f27f9`

::: tip
You can browse extensions using the `cmd-shift-x` shortcut
:::

## Prettier config

For global Prettier settings, create a `.prettierrc` file in your home directory with this command:

```sh
nano ~/.prettierrc
```

and past the following settings:

```json
{
    "trailingComma": "es5",
    "semi": true,
    "singleQuote": true,
    "tabWidth": 4,
    "printWidth": 80
}
```
