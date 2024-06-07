<ul class="footer-links list-unstyled">
    @foreach ($links as $link)
    <li><a href="{{ $link->page ? '/donate/' . $link->page->id . '/' . Str::slug($link->page->title) : $link->link }}"><i
                class="bi bi-chevron-right"></i> {{ $link->name }}</a></li>
    @endforeach
</ul>