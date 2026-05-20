<x-app-layout>
    <section class="zine about section-block section-bordered">
        <div class="zine__inner">
            <div class="about__spread">
                <div class="about__col about__col--main">
                    <h1 class="section__label">/ MANIFESTO</h1>
                    <h3 class="about__title">More than cleaning.<br>It's <span class="highlight">restoration</span>.</h3>
                    <p class="about__body">Clean Touch was founded with a simple idea: that a clean home should feel like a sanctuary, not a showroom. We use eco-safe products. We take our time. We believe the small details — the dust-free baseboard, the streak-free mirror, the smell of fresh air — add up to something meaningful.</p>
                    <p class="about__body" style="margin-top:-1.5rem">Every home has a story, and we're honored to be a part of it. Whether it's a weekly refresh or a seasonal deep clean, our approach is the same: meticulous, respectful, and thorough. We're not happy until you can feel the difference.</p>
                    <div class="about__tape"></div>
                    <div class="about__stats">
                        <div class="about-stat">
                            <span class="about-stat__num">{{ $stats['years'] ?? '11+' }}</span>
                            <span class="about-stat__label">years in print</span>
                        </div>
                        <div class="about-stat">
                            <span class="about-stat__num">{{ $stats['homes'] ?? '5000+' }}</span>
                            <span class="about-stat__label">homes featured</span>
                        </div>
                        <div class="about-stat">
                            <span class="about-stat__num">{{ $stats['eco'] ?? '100%' }}</span>
                            <span class="about-stat__label">eco-friendly ink</span>
                        </div>
                    </div>
                </div>
                <div class="about__col about__col--aside">
                    <div class="about__side-note">
                        <p style="font-family:'Caveat',cursive;font-size:20px;line-height:1.4">"We don't just clean spaces — we restore how they feel."</p>
                        <span style="font-size:12px;opacity:0.5">&mdash; founder's note</span>
                    </div>
                    <div class="about__sketch">&amp;</div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
