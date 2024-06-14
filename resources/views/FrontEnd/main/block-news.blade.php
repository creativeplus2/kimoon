<section class="block-news blog-one blog-one--page">
    <div class="container">

        <div class="row gutter-y-30">
            @foreach ($news as $new)

            <div class="col-md-6 col-lg-4">
                <div class="blog-card wow fadeInUp animated" data-wow-duration="1500ms" data-wow-delay="100ms"
                    style="visibility: visible; animation-duration: 1500ms; animation-delay: 100ms; animation-name: fadeInUp;">
                    <div class="blog-card__image ratio ratio-4x3">
                        <img src="{{ '/storage/uploads/featuredimage/' . $new->featured_image }}"
                            class="object-fit-cover" alt="{{ $new->title }}">
                        <img src="{{ '/storage/uploads/featuredimage/' . $new->featured_image }}"
                            class="object-fit-cover" alt="{{ $new->title }}">
                        <a href="news/{{ $new->slug}}" class="blog-card__image__link"><span class="sr-only"> {{
                                $new->title }}</span>
                            <!-- /.sr-only --></a>
                        <div class="blog-card__date"><span>{{ getDate2($new->updated_at)}}</span>
                            {{ getMonth2($new->updated_at)}} {{ getYear2($new->updated_at)}}</div>
                        <!-- /.blog-card__date -->
                    </div><!-- /.blog-card__image -->
                    <div class="blog-card__content">

                        <h3 class="blog-card__title">
                            <a href="news/{{ $new->slug}}">
                                {{ $new->title }}
                            </a>
                        </h3><!-- /.blog-card__title -->
                        <a href="news/{{ $new->slug}}" class="blog-card__link">
                            Read more
                            <i class="icon-right-arrow"></i>
                        </a><!-- /.blog-card__link -->
                    </div><!-- /.blog-card__content -->
                </div><!-- /.blog-card -->
            </div><!-- /.col-md-6 col-lg-4 -->
            @endforeach
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>