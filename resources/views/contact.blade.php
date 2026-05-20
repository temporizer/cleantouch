<x-app-layout>
    <div class="pt-28 pb-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20">
                <!-- Left: Info -->
                <div class="animate-fade-in-left" style="opacity:0;animation-fill-mode:forwards;">
                    <span class="badge badge-primary mb-3">Get in Touch</span>
                    <h1 class="text-4xl md:text-5xl font-heading font-bold text-surface-900 dark:text-white mb-4">Let's Talk</h1>
                    <p class="text-lg text-surface-500 dark:text-surface-400 leading-relaxed mb-10">
                        Have a project in mind or just want to say hi? I'd love to hear from you. Fill out the form and I'll get back to you as soon as possible.
                    </p>

                    <div class="space-y-8">
                        <div class="flex items-start gap-5 group">
                            <div class="w-12 h-12 bg-primary-50 dark:bg-primary-950/50 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-surface-900 dark:text-white">Email</h4>
                                <p class="text-sm text-surface-500 dark:text-surface-400 mt-0.5">hello@jinoconklin.com</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-5 group">
                            <div class="w-12 h-12 bg-accent-50 dark:bg-accent-950/50 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-accent-600 dark:text-accent-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-surface-900 dark:text-white">Location</h4>
                                <p class="text-sm text-surface-500 dark:text-surface-400 mt-0.5">Somewhere on the internet</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Form -->
                <div class="animate-fade-in-right" style="opacity:0;animation-fill-mode:forwards;">
                    <div class="card p-6 md:p-8">
                        <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
                            @csrf

                            <div class="space-y-1.5">
                                <label for="name" class="text-sm font-medium text-surface-700 dark:text-surface-300">Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required placeholder="Your name" class="input">
                                @error('name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>

                            <div class="space-y-1.5">
                                <label for="email" class="text-sm font-medium text-surface-700 dark:text-surface-300">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required placeholder="you@example.com" class="input">
                                @error('email') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>

                            <div class="space-y-1.5">
                                <label for="subject" class="text-sm font-medium text-surface-700 dark:text-surface-300">Subject</label>
                                <input type="text" name="subject" id="subject" value="{{ old('subject') }}" placeholder="What's this about?" class="input">
                            </div>

                            <div class="space-y-1.5">
                                <label for="message" class="text-sm font-medium text-surface-700 dark:text-surface-300">Message</label>
                                <textarea name="message" id="message" rows="5" required placeholder="Tell me about your project..." class="textarea">{{ old('message') }}</textarea>
                                @error('message') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-full">
                                Send Message
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
