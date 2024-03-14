<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name') }}</title>
</head>
<body>
  <div id="app"></div>
  @vite('resources/js/app.js')
</body>
</html>