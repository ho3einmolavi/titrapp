<div class="ui-block">
    <article class="hentry blog-post">

        <a href="/blog/{{$blog_item->id}}">
            <div class="post-thumb">
                <img style="height: 290px;" src="{{$blog_item->image}}" alt="photo">
            </div>

            <div class="post-content">
                @if($blog_item->related)
                    @foreach($blog_item->related as $item)
                        <a href="#" class="post-category bg-primary">{{ $item }}</a>
                    @endforeach
                @endif

                <a href="/blog/{{$blog_item->id}}"  class="h4 post-title">{{$blog_item->title}} </a>
                <p>
                    {{!empty($blog_item->body) ? \Illuminate\Support\Str::limit(strip_tags($blog_item->body) , 100) : ''}}
                </p>
                <div class="author-date">
                    <div class="post__date">
                        <time class="published" datetime="2017-03-24T18:18">
                            {{\Morilog\Jalali\Jalalian::forge($blog_item->created_at)->ago()}}
                        </time>
                    </div>
                </div>

                <div class="post-additional-info inline-items">
                    <div class="comments-shared">
                        <a href="#" class="post-add-icon inline-items">
                           <span class="fa fa-eye"></span>
                            <span>{{$blog_item->view}}</span>
                        </a>
                    </div>

                </div>
            </div>
        </a>


    </article>

    <!-- ... end Post -->
</div>

