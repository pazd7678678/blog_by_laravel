<div class="col-lg-8 col-md-12">
    <div class="latest-post mb-50">
        <div class="widget-header position-relative mb-30">
            <div class="row">
                <div class="col-7">
                    <h4 class="widget-title mb-0">جدیدترین <span>پست ها</span></h4>
                </div>
                <div class="col-5 text-left">
                    <h6 class="font-medium pl-15">
                        <a class="text-muted font-small" href="#">مشاهده همه</a>
                    </h6>
                </div>
            </div>
        </div>
        <div class="loop-list-style-1">
            @foreach($homeRepo->getLatestArticles() as $article)
                <article class="first-post p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                    <div class="img-hover-slide border-radius-15 mb-30 position-relative overflow-hidden">
                        <span class="top-right-icon bg-dark">
                            <i class="mdi mdi-flash-on">

                            </i>
                        </span>
                        <a target="_blank" href="{{$article->path()}}">
                            <img src="{{$article->imagePath}}" alt="{{$article->title}}">
                        </a>
                    </div>
                    <div class="pr-10 pl-10">
                        <div class="entry-meta mb-30">
                            <a class="entry-meta meta-0" href="{{$article->category->path()}}">
                                <span class="post-in background2 text-primary font-x-small">{{$article->category->title}}
                                </span>
                            </a>
                            <div class="float-left font-small">
                                <span><span class="ml-10 text-muted"><i class="fa fa-eye" aria-hidden="true"></i></span>5.8 هزار</span>
                                <span class="mr-30"><span class="ml-10 text-muted"><i class="fa fa-comment" aria-hidden="true"></i></span>2.5 هزار</span>
                                <span class="mr-30"><span class="ml-10 text-muted"><i class="fa fa-share-alt" aria-hidden="true"></i></span>125 هزار</span>
                            </div>
                        </div>
                        <h4 class="post-title mb-20">
                            <a target="_blank" href="{{$article->path()}}">
                                {{$article->title}}
                            </a>
                        </h4>
                        <div class="mb-20 overflow-hidden">
                            <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                <span class="post-by">توسط <a href="author.html">
                                        {{$article->user->name}}
                                    </a>
                                </span>
                                <span class="post-on">
                                  (  {{$article->created_at->diffForHumans()}})
                                </span>
                                <span class="time-reading">زمان خواندن {{$article->time_to_read}} دقیقه</span>
                                <p class="font-x-small mt-10"> به روز شده {{$article->updated_at->diffForHumans()}}</p>
                            </div>
                            <div class="float-left">
                                <a target="_blank" href="{{$article->path()}}l" class="read-more"><span class="ml-10">
                                        <i class="fa fa-thumbtack" aria-hidden="true">
                                        </i>
                                    </span>انتخاب توسط ویراستار</a>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach

        </div>
    </div>
    <div class="pagination-area mb-30">
{{--      {{$articles->links()}}--}}
    </div>
    @include('Home::parts.advs_bottom')
</div>
