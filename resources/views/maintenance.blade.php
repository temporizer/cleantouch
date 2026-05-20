<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance — JinoConklin</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|plus-jakarta-sans:500,600,700,800" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
    </script>
</head>
<body class="min-h-screen bg-white dark:bg-surface-900 text-surface-900 dark:text-surface-100 transition-colors duration-300">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-primary-200/30 dark:bg-primary-800/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-72 h-72 bg-accent-400/20 dark:bg-accent-800/20 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-primary-100/20 dark:bg-primary-900/10 rounded-full blur-3xl"></div>
    </div>

    <div class="relative min-h-screen flex items-center justify-center px-4">
        <div class="text-center max-w-lg">
            <div class="w-20 h-20 bg-gradient-to-br from-primary-500 to-accent-500 rounded-2xl flex items-center justify-center mx-auto mb-8 animate-float shadow-xl shadow-primary-500/25">
                <svg class="w-10 h-10 text-white animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <h1 class="text-4xl md:text-5xl font-heading font-bold text-surface-900 dark:text-white mb-4">Under Maintenance</h1>
            <p class="text-lg text-surface-500 dark:text-surface-400 leading-relaxed">We're making some improvements behind the scenes. We'll be back shortly with something great.</p>

            <div class="mt-10 flex justify-center gap-2">
                <div class="w-2 h-2 rounded-full bg-primary-500 dark:bg-primary-400 animate-pulse-soft"></div>
                <div class="w-2 h-2 rounded-full bg-accent-500 dark:bg-accent-400 animate-pulse-soft" style="animation-delay: 0.5s;"></div>
                <div class="w-2 h-2 rounded-full bg-primary-500 dark:bg-primary-400 animate-pulse-soft" style="animation-delay: 1s;"></div>
                <div class="w-2 h-2 rounded-full bg-accent-500 dark:bg-accent-400 animate-pulse-soft" style="animation-delay: 1.5s;"></div>
            </div>
        </div>
    </div>
</body>
</html>
