# Silverstripe Vite Plugin

this package is a fork of original: passchn/silverstripe-vite.
note this package may undergo some development overtime so be sure you lock to the version that works in your application.
This package is compatible with both nginx and appache servers out of the box.

For local development be sure to run `npm run watch` in the `themes/template` folder. if using homestead **install npm and run watch from your windows machine** to generate correct symlinks and add ability to watch file changes.
To thus far no option for `npm run dev` on homestead, might work on Xamp or Mamp but not tried yet.

For feature requests drop a PR or send a message.
Enjoy :)

## Silverstripe Version support

* `0.0.5` supports Silverstripe 4.x | php 7.4
* `^1.0` supports Silverstripe 4.x | php 8.1
* `^1.0.1` supports Silverstripe 5.x. | php 8.1
* `^1.0.2` supports Silverstripe 6.x. | ^php 8.3

## Installation

```
composer require dima-support/silverstripe-vite
```

In your `mysite.yml`:

```
Page:
  extensions:
    - ViteHelper\Vite\ViteDataExtension
```

## Configuration

You can override the default config in your `mysite.yml`:

```
ViteHelper\Vite\ViteHelper:
  forceProductionMode: false
  devHostNeedle: $_SERVER['HTTP_HOST']
  devPort: 3000
  jsSrcDirectory: '/public/_resources/themes/template/src/js/'
  mainJS: 'main.js'
  manifestDir: '/public/manifest.json'
```

*ViteHelper Config setting options:*
- If you set `forceProductionMode` to true, the build files (created after running `vite build`) will be served.
- Set the `devHostNeedle` to distinguish your live site from your local environment, e.g `localhost:8080`, `mysite.test` or `127.0.0.1`. 
  - **Note:** The vite dev server must also be running. 
- Set the `devPort` to the port of the vite dev server, e.g. `3000` – the vite port will be shown in the terminal when running the dev server. To set a fixed port (recommended), remember to also set it in the [vite config](https://github.com/brandcom/silverstripe-vite/wiki/example-vite-config) - under `server`. The port in both configs must always match. 
- Define the `mainJS` entry point to where your applications script file is located.
  - E.g., if you use TypeScript, change the `mainJs` prop to `"main.ts"`.
- Define the `manifestDir` for where the manifest file will be located.

## Usage

Insert JS / CSS tags in your main template, e.g., `Page.ss`:

```
<head>
    ...
    $Vite.HeaderTags.RAW
</head>
<body>
    ...
    $Vite.BodyTags.RAW
</body>
```

## Vite config

The config must match the `vite.config.js`. You need to **?flush** after making changes to yml configs.

Take a look at the [ViteHelper.php](https://github.com/passchn/silverstripe-vite/blob/master/src/Vite/ViteHelper.php) for more Information. 

The config from your vite.config.js or vite.config.ts must match your ViteHelper config for this plugin.

See this [example vite.config.ts](https://github.com/brandcom/silverstripe-vite/wiki/example-vite-config) for default configuration. 

**Note:** When using vite below `2.9.0`, the server config will be different. [See this config](https://github.com/brandcom/silverstripe-vite/wiki/example-vite-config#vite-below-290).
