<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <script src="https://kit.fontawesome.com/f33ab3ed92.js" crossorigin="anonymous"></script>
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @inertiaHead
        @routes
    </head>
    <body>
        @inertia('blog-app')
    </body>
</html>