<x-app-layout>
    <!-- HERO -->
    <section class="zine hero" id="home">
        <div class="zine__inner">
            <div class="hero__layout">
                <div class="hero__main">
                    <div class="hero__stamp" data-editable="hero_stamp">{{ $content['hero_stamp'] }}</div>
                    <h1 class="hero__title">
                        <span class="hero__title-main" data-editable="hero_title_main">{{ $content['hero_title_main'] }}</span>
                        <span class="hero__title-sub" data-editable="hero_title_sub">{{ $content['hero_title_sub'] }}</span>
                    </h1>
                    <p class="hero__body rich-editor" data-editable="hero_body">{!! $content['hero_body'] !!}</p>
                    <div class="hero__actions">
                        <a href="#services" class="btn-zine"><span data-editable="hero_btn_primary">{{ $content['hero_btn_primary'] }}</span></a>
                        <a href="#contact" class="btn-zine btn-zine--outline"><span data-editable="hero_btn_secondary">{{ $content['hero_btn_secondary'] }}</span></a>
                    </div>
                </div>
                <div class="hero__aside">
                    <div class="hero__polaroid">
                        <div class="polaroid__img">
                            <img src="/img/logo.png" alt="Clean Touch logo" class="polaroid__photo" />
                        </div>
                        <span class="polaroid__label" style="font-family:'Caveat',cursive;font-size:18px" data-editable="hero_polaroid_label">{{ $content['hero_polaroid_label'] }}</span>
                    </div>
                    <div class="hero__sticker" data-editable="hero_sticker">{{ $content['hero_sticker'] }}</div>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICES -->
    <section class="zine services section-block section-bordered" id="services">
        <div class="zine__inner">
            <div class="services__header">
                <h2 class="section__label" data-editable="services_header">{{ $content['services_header'] }}</h2>
                <p class="section__sub" data-editable="services_subtitle">{{ $content['services_subtitle'] }}</p>
            </div>
            <div class="services__grid">
                @php $rotations = [-1.5, 2.5, -1, 1.8, -2.2, 0.8]; @endphp
                @for($i = 1; $i <= 6; $i++)
                <div class="polaroid-card" style="transform:rotate({{ $rotations[$i-1] }}deg)">
                    <div class="polaroid-card__content">
                        <h3 class="polaroid-card__title" data-editable="service_{{ $i }}_title">{!! $content['service_' . $i . '_title'] !!}</h3>
                        <p class="polaroid-card__desc" data-editable="service_{{ $i }}_desc">{!! $content['service_' . $i . '_desc'] !!}</p>
                    </div>
                    <div class="polaroid-card__stamp">APPROVED</div>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- ABOUT / MANIFESTO -->
    <section class="zine about section-block section-bordered" id="about">
        <div class="zine__inner">
            <div class="about__spread">
                <div class="about__col about__col--main">
                    <h2 class="section__label" data-editable="manifesto_label">{{ $content['manifesto_label'] }}</h2>
                    <h3 class="about__title" data-editable="manifesto_title">{!! $content['manifesto_title'] !!}</h3>
                    <p class="about__body rich-editor" data-editable="manifesto_body">{!! $content['manifesto_body'] !!}</p>
                    <div class="about__tape"></div>
                    <div class="about__stats">
                        @for($j = 1; $j <= 3; $j++)
                        <div class="about-stat">
                            <span class="about-stat__num" data-editable="manifesto_stat_{{ $j }}_num">{{ $content['manifesto_stat_' . $j . '_num'] }}</span>
                            <span class="about-stat__label" data-editable="manifesto_stat_{{ $j }}_label">{{ $content['manifesto_stat_' . $j . '_label'] }}</span>
                        </div>
                        @endfor
                    </div>
                </div>
                <div class="about__col about__col--aside">
                    <div class="about__side-note">
                        <p style="font-family:'Caveat',cursive;font-size:20px;line-height:1.4" data-editable="manifesto_quote">{!! $content['manifesto_quote'] !!}</p>
                        <span style="font-size:12px;opacity:0.5" data-editable="manifesto_quote_author">{{ $content['manifesto_quote_author'] }}</span>
                    </div>
                    <div class="about__sketch">&amp;</div>
                </div>
            </div>
        </div>
    </section>

    <!-- PRICING -->
    <section class="zine pricing section-block section-bordered" id="pricing">
        <div class="zine__inner">
            <div class="pricing__header">
                <h2 class="section__label" data-editable="pricing_header">{{ $content['pricing_header'] }}</h2>
                <p class="section__sub" data-editable="pricing_subtitle">{{ $content['pricing_subtitle'] }}</p>
            </div>
            <div class="pricing__classifieds">
                @for($p = 1; $p <= 3; $p++)
                <div class="classified{{ $p === 2 ? ' classified--featured' : '' }}">
                    <div class="classified__tag" data-editable="pricing_{{ $p }}_tag">{{ $content['pricing_' . $p . '_tag'] }}</div>
                    <h3 class="classified__title" data-editable="pricing_{{ $p }}_title">{{ $content['pricing_' . $p . '_title'] }}</h3>
                    <p class="classified__price" data-editable="pricing_{{ $p }}_price">{!! $content['pricing_' . $p . '_price'] !!}</p>
                    <p class="classified__desc" data-editable="pricing_{{ $p }}_desc">{{ $content['pricing_' . $p . '_desc'] }}</p>
                    <div class="classified__cutline"></div>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS -->
    <section class="zine testimonials section-block section-bordered" id="reviews">
        <div class="zine__inner">
            <div class="testimonials__header">
                <h2 class="section__label" data-editable="testimonials_header">{{ $content['testimonials_header'] }}</h2>
            </div>
            <div class="testimonials__list">
                @for($t = 1; $t <= 3; $t++)
                <div class="letter">
                    <div class="letter__quote">&ldquo;</div>
                    <p class="letter__text" data-editable="testimonial_{{ $t }}_text">{{ $content['testimonial_' . $t . '_text'] }}</p>
                    <cite class="letter__author" data-editable="testimonial_{{ $t }}_author">{{ $content['testimonial_' . $t . '_author'] }}</cite>
                    <div class="letter__tape"></div>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="zine cta section-block section-bordered" id="contact">
        <div class="zine__inner">
            <div class="cta__spread">
                <h2 class="cta__title" data-editable="cta_title">{!! $content['cta_title'] !!}</h2>
                <p class="cta__body rich-editor" data-editable="cta_body">{!! $content['cta_body'] !!}</p>
                <div class="cta__actions">
                    <a href="{{ route('contact.index') }}" class="btn-zine btn-zine--solid"><span data-editable="cta_btn">{{ $content['cta_btn'] }}</span></a>
                    <div class="cta__details">
                        <span data-editable="cta_email">{{ $content['cta_email'] }}</span>
                        <span class="cta__sep">/</span>
                        <span data-editable="cta_locations">{!! $content['cta_locations'] !!}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- COLOPHON -->
    <footer class="colophon section-block">
        <div class="colophon__inner">
            <div class="colophon__grid">
                <div class="colophon__col">
                    <h4 data-editable="colophon_site_name">{{ $content['colophon_site_name'] }}</h4>
                    <p data-editable="colophon_issue">{{ $content['colophon_issue'] }}</p>
                </div>
                <div class="colophon__col">
                    <h4 data-editable="colophon_contact_title">{{ $content['colophon_contact_title'] }}</h4>
                    <p><a href="tel:+13607199650" data-editable="colophon_phone">{{ $content['colophon_phone'] }}</a><br><a href="mailto:info@cleantouchllc.net" data-editable="colophon_email">{{ $content['colophon_email'] }}</a></p>
                </div>
                <div class="colophon__col">
                    <h4 data-editable="colophon_distribution_title">{{ $content['colophon_distribution_title'] }}</h4>
                    <p data-editable="colophon_locations">{!! $content['colophon_locations'] !!}</p>
                </div>
            </div>
            <div class="colophon__bottom">
                <p data-editable="colophon_copyright">{!! $content['colophon_copyright'] !!}</p>
            </div>
        </div>
    </footer>
</x-app-layout>
