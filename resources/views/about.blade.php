<x-app-layout>
    <section class="zine about section-block section-bordered">
        <div class="zine__inner">
            <div class="about__spread">
                <div class="about__col about__col--main">
                    <h1 class="section__label" data-editable="section_label">{{ $content['section_label'] }}</h1>
                    <h3 class="about__title" data-editable="about_title">{!! $content['about_title'] !!}</h3>
                    <p class="about__body rich-editor" data-editable="body">{!! $content['body'] !!}</p>
                    <p class="about__body" style="margin-top:-1.5rem" data-editable="body_2">{!! $content['body_2'] ?? '' !!}</p>
                    <div class="about__tape"></div>
                    <div class="about__stats">
                        @for($s = 1; $s <= 3; $s++)
                        <div class="about-stat">
                            <span class="about-stat__num" data-editable="stat_{{ $s }}_num">{{ $content['stat_' . $s . '_num'] }}</span>
                            <span class="about-stat__label" data-editable="stat_{{ $s }}_label">{{ $content['stat_' . $s . '_label'] }}</span>
                        </div>
                        @endfor
                    </div>
                </div>
                <div class="about__col about__col--aside">
                    <div class="about__side-note">
                        <p style="font-family:'Caveat',cursive;font-size:20px;line-height:1.4" data-editable="quote">{!! $content['quote'] !!}</p>
                        <span style="font-size:12px;opacity:0.5" data-editable="quote_author">{{ $content['quote_author'] }}</span>
                    </div>
                    <div class="about__sketch">&amp;</div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
