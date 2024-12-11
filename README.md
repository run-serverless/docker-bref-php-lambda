# Dockerised PHP running on AWS Lambda

An example setup to run PHP inside a Docker container on AWS Lambda using [Bref](https://bref.sh/).

## Requirements

- Composer
- Node.js and NPM
- AWS account
- AWS CLI installed and configured with credentials
- A centralised Serverless Framework deployment S3 bucket using the format <aws-account-id>--serverless-deploys

Replace <aws-account-id> with your AWS account ID. Create the bucket with default settings.

## Installation

Install NPM and Composer dependencies

```bash
npm install
```

## Deployment

Build Docker image, deploy infrastructure and Lambda PHP handler. Appends **-dev** to resource names

```bash
npx serverless deploy
```

Once deployed the console will output a URL `endpoint` like below. Open the URL and you should see `Hello World` output to the
screen. If you add the query string `?name=YOUR_NAME` to the URL, it will output `Hello YOUR_NAME`.

```bash
Deploying php-docker to stage dev (us-east-1)

✔ Service deployed to stack php-docker-dev (85s)

endpoint: https://ysgw63bbcfifirgzjxws3wgtm40thets.lambda-url.us-east-1.on.aws/
functions:
  handler: php-docker-dev-handler
```


### Deploying to production and staging environments

Deploy infrastructure with a specific stage name appended to resource names. In the example below resources will have
**-production** appended to them.

```bash
npx serverless deploy --stage production
```

## Usage

The PHP application is inside the **app** folder along with the vendor (Composer dependencies) folder. The **index.php**
file is the event handler called by Lambda. Place all your PHP files in the app folder and call them from the
**index.php** handler.

## Local Development

You can run the Docker container locally (once the image is built) using the following command:

```bash
docker run --rm -it --entrypoint= -v ./app:/var/task:ro serverless-php-docker-dev:bref-php-app vendor/bin/bref-local handler.php
```

You can also pass event parameters by adding the JSON event payload to the end of the command, like this:

```bash
docker run --rm -it --entrypoint= -v ./app:/var/task:ro serverless-php-docker-dev:bref-php-app vendor/bin/bref-local handler.php '{"queryStringParameters": {"name": "Jane"}}'
```

There is also an npm command yu can use which is much shorter:

```bash
npm run local
```

and with parameters:

```bash
npm run local '{"queryStringParameters": {"name": "Jane"}}'
```
