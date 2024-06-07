<!-- ======= Post Grid Section ======= -->
<section id="posts" class="posts">
    <div class="container" data-aos="fade-up">
        <div class="row g-5">
            <div class="col-lg-4">
                @foreach ($section1 as $page)
                <div class="post-entry-1 lg">
                    <a href="/donate/{{ $page->page->id }}/{{ Str::slug($page->page->title) }}"><img
                            src="{{ $page->page->image->getUrl() }}" alt="{{ $page->page->title }}"
                            class="img-fluid"></a>
                    <h3><a href="/donate/{{ $page->page->id }}/{{ Str::slug($page->page->title) }}">{{ $page->page->title
                            }}</a></h3>
                    <p class="mb-4 d-block">{{ $page->page->description }}</p>
                </div>
                @endforeach
            </div>

            <div class="col-lg-8">
                <div class="row g-5">

                    <div class="col-lg-8 border-start custom-border">
                        <div class="row">
                            <div class="col-md-6">
                                @if ($section2[0])
                                <div class="post-entry-1">
                                    <a href="/donate/{{ $section2[0]->page->id }}/{{ Str::slug($section2[0]->page->title) }}"><img
                                            src="{{ $section2[0]->page->image->getUrl() }}"
                                            alt="{{ $section2[0]->page->title }}" class="img-fluid"></a>
                                    <h2><a
                                            href="/donate/{{ $section2[0]->page->id }}/{{ Str::slug($section2[0]->page->title) }}">{{
                                            $section2[0]->page->title }}</a><br><small>{{
                                            Str::limit($section2[0]->page->description, 50, '...')
                                            }}</small></h2>
                                </div>
                                @endif
                                @if ($section2[1])
                                <div class="post-entry-1">
                                    <a href="/donate/{{ $section2[1]->page->id }}/{{ Str::slug($section2[1]->page->title) }}"><img
                                            src="{{ $section2[1]->page->image->getUrl() }}"
                                            alt="{{ $section2[1]->page->title }}" class="img-fluid"></a>
                                    <h2><a
                                            href="/donate/{{ $section2[1]->page->id }}/{{ Str::slug($section2[1]->page->title) }}">{{
                                            $section2[1]->page->title }}</a><br><small>{{
                                            Str::limit($section2[1]->page->description, 50, '...')
                                            }}</small></h2>
                                </div>
                                @endif
                                @if ($section2[2])
                                <div class="post-entry-1">
                                    <a href="/donate/{{ $section2[2]->page->id }}/{{ Str::slug($section2[2]->page->title) }}"><img
                                            src="{{ $section2[2]->page->image->getUrl() }}"
                                            alt="{{ $section2[2]->page->title }}" class="img-fluid"></a>
                                    <h2><a
                                            href="/donate/{{ $section2[2]->page->id }}/{{ Str::slug($section2[2]->page->title) }}">{{
                                            $section2[2]->page->title }}</a><br><small>{{
                                            Str::limit($section2[2]->page->description, 50, '...')
                                            }}</small></h2>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                @if ($section2[3])
                                <div class="post-entry-1">
                                    <a href="/donate/{{ $section2[3]->page->id }}/{{ Str::slug($section2[3]->page->title) }}"><img
                                            src="{{ $section2[3]->page->image->getUrl() }}"
                                            alt="{{ $section2[3]->page->title }}" class="img-fluid"></a>
                                    <h2><a
                                            href="/donate/{{ $section2[3]->page->id }}/{{ Str::slug($section2[3]->page->title) }}">{{
                                            $section2[3]->page->title }}</a><br><small>{{
                                            Str::limit($section2[3]->page->description, 50, '...')
                                            }}</small></h2>
                                </div>
                                @endif
                                @if ($section2[4])
                                <div class="post-entry-1">
                                    <a href="/donate/{{ $section2[4]->page->id }}/{{ Str::slug($section2[4]->page->title) }}"><img
                                            src="{{ $section2[4]->page->image->getUrl() }}"
                                            alt="{{ $section2[4]->page->title }}" class="img-fluid"></a>
                                    <h2><a
                                            href="/donate/{{ $section2[4]->page->id }}/{{ Str::slug($section2[4]->page->title) }}">{{
                                            $section2[4]->page->title }}</a><br><small>{{
                                            Str::limit($section2[4]->page->description, 50, '...')
                                            }}</small></h2>
                                </div>
                                @endif
                                @if ($section2[5])
                                <div class="post-entry-1">
                                    <a href="/donate/{{ $section2[5]->page->id }}/{{ Str::slug($section2[5]->page->title) }}"><img
                                            src="{{ $section2[5]->page->image->getUrl() }}"
                                            alt="{{ $section2[5]->page->title }}" class="img-fluid"></a>
                                    <h2><a
                                            href="/donate/{{ $section2[5]->page->id }}/{{ Str::slug($section2[5]->page->title) }}">{{
                                            $section2[5]->page->title }}</a><br><small>{{
                                            Str::limit($section2[5]->page->description, 50, '...')
                                            }}</small></h2>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Trending Section -->
                    <div class="col-lg-4">

                        <div class="trending">
                            <h3>Destaque</h3>
                            <ul class="trending-post">
                                @foreach ($section2 as $page)
                                <li>
                                    <a href="/donate/{{ $page->page->id }}/{{ Str::slug($page->page->title) }}">
                                        <h3>{{ $page->page->title }}</h3>
                                        <span class="author">{{ Str::limit($page->page->description, 50, '...')
                                            }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                    </div> <!-- End Trending Section -->
                </div>

            </div> <!-- End .row -->
        </div>
</section> <!-- End Post Grid Section -->