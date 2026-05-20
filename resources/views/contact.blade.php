<x-app-layout>
    <section class="zine contact section-block" id="contact">
        <div class="zine__inner">
            <div class="contact__spread">
                <div class="contact__col contact__col--main">
                    <h2 class="section__label">/ GET IN TOUCH</h2>
                    <p class="section__sub" style="margin-bottom:40px">Fill out the form below — or give us a call. We'll get back to you within 24 hours.</p>

                    <div class="contact__form-wrap">
                        <form class="zine-form" method="POST" action="{{ route('contact.store') }}">
                            @csrf

                            <div class="zine-form__group">
                                <label class="zine-form__label" for="name">Name</label>
                                <input type="text" id="name" name="name" class="zine-form__input" value="{{ old('name') }}" required>
                                @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div class="zine-form__group">
                                <label class="zine-form__label" for="email">Email</label>
                                <input type="email" id="email" name="email" class="zine-form__input" value="{{ old('email') }}" required>
                                @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div class="zine-form__group">
                                <label class="zine-form__label" for="phone">Phone</label>
                                <input type="tel" id="phone" name="phone" class="zine-form__input" value="{{ old('phone') }}">
                                @error('phone') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div class="zine-form__group">
                                <label class="zine-form__label" for="subject">Subject</label>
                                <input type="text" id="subject" name="subject" class="zine-form__input" value="{{ old('subject') }}">
                            </div>

                            <div class="zine-form__group">
                                <label class="zine-form__label" for="message">Message</label>
                                <textarea id="message" name="message" class="zine-form__textarea" required>{{ old('message') }}</textarea>
                                @error('message') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div class="zine-form__actions">
                                <button type="submit" class="btn-zine btn-zine--solid">Send Message</button>
                            </div>
                        </form>
                        <div class="contact__tape"></div>
                    </div>
                </div>
                <div class="contact__col contact__col--aside">
                    <div class="contact__side-card">
                        <div class="contact__side-stamp">PREFERRED</div>
                        <h3 class="contact__side-title">Call us directly</h3>
                        <a href="tel:+13607199650" class="contact__side-phone">(360) 719-9650</a>
                        <p class="contact__side-note">Mon&ndash;Sun, 8am&ndash;5pm</p>
                        <div class="contact__cutline"></div>
                        <p class="contact__side-email">
                            <a href="mailto:info@cleantouchllc.net">info@cleantouchllc.net</a>
                        </p>
                        <p class="contact__side-location">Vancouver, WA &middot; Portland, OR</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
