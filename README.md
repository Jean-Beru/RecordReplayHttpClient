# RecordReplayHttpClient

## Introduction
RecordReplayHttpClient is a powerful HTTP client library designed for recording and replaying HTTP requests and responses. It enhances testing capabilities by allowing developers to simulate various responses for given requests.

## Features
- Simple API for sending HTTP requests.
- Ability to record requests and responses.
- Replay saved requests and responses for testing.
- Support for various HTTP methods (GET, POST, PUT, DELETE).
- Easy integration with testing frameworks.

## Installation
To install RecordReplayHttpClient, use the following command:

```
npm install record-replay-http-client
```

Alternatively, you can add it to your project dependencies in your package.json file:

```json
"dependencies": {
  "record-replay-http-client": "^1.0.0"
}
```

## Usage
Here's a quick example of how to use the RecordReplayHttpClient:

```javascript
const { HttpClient } = require('record-replay-http-client');

// Create an instance of the HttpClient
const client = new HttpClient();

// Send a GET request
client.get('https://api.example.com/data')
  .then(response => {
    console.log('Data:', response.data);
  })
  .catch(error => {
    console.error('Error:', error);
  });

// Record a request
client.recordRequest('https://api.example.com/data');

// Replay a recorded request
client.replayRequest('https://api.example.com/data');
```

## Examples
### Recording a Request
To record a request, simply call the `recordRequest` method with the URL you want to record:

```javascript
client.recordRequest('https://api.example.com/data');
```

### Replaying a Request
To replay a previously recorded request, use the `replayRequest` method:

```javascript
client.replayRequest('https://api.example.com/data');
```

## Conclusion
RecordReplayHttpClient is a feature-rich library that simplifies handling HTTP requests for testing scenarios. Its recording and replaying capabilities make it an invaluable tool for developers looking to enhance their testing processes.

