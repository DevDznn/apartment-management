<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Minimalist Messenger</title>
  @vite('resources/css/app.css')
</head>

<body class="bg-[#021908] text-[#021908] h-screen flex flex-col md:flex-row">

  @include('components.message')

  <script src="{{ asset('js/chat.js') }}"></script>
    
</body>

</html>