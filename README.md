# Dockerised PHP running on AWS Lambda

An example setup to run PHP inside a Docker container on AWS Lambda using [Bref](https://bref.sh/).

## Requirements

- Composer
- Node.js and NPM

## Installation

Install NPM and Composer dependencies

```bash
npm install
```

## Deployment

Build Docker image, deploy infrastructure and Lambda handler

```bash
npm install
```

Once deployed the console will output a URL like below. Open the URL and you should see `Hello World` output to the
screen. If you add the query string `?name=YOUR_NAME` to the URL, it will output `Hello YOUR_NAME`.

## Usage

The PHP application is inside the **app** folder along with the vendor (Composer dependencies) folder. The **index.php**
file is the event handler called by Lambda. Place all your PHP files in the app folder and call them from the
**index.php** handler.
