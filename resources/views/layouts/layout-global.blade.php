<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- daisyUI --}}
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.47.0/dist/full.css" rel="stylesheet" type="text/css" />

    @yield('script_head')

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Tailwind Config --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {}
            }
        }
    </script>

    {{-- Page Title --}}
    <title>Desa Bug-Bug | {{ $page_title }}</title>
</head>

<body class="flex flex-col min-h-screen bg-slate-100">
    @yield('global_layout')

    @yield('script')

    <script type="text/javascript" src="/js/app.js"></script>
</body>

</html>
