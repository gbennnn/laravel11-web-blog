 @props(['title', 'date', 'description', 'user', 'link'])
 <div class="post-preview">
    <a href="post.html">
        <h2 class="post-title">{{ $title }}</h2>
        <h3 class="post-subtitle">
            @isset($description)
                {{ $description }}
            @endisset
        </h3>
    </a>
    <p class="post-meta">
        Posted by
        <a href="#!">{{ $user }}</a>
        {{ $date }}
    </p>
</div>
<hr class="my-4" />
