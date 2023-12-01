<div class="comment-form">
    <h3 class="mb-30">ارسال نظرات</h3>
    <form class="form-contact comment_form" action="{{route('comments.store')}}" method="POST" id="commentForm">
        @csrf
        <input type="hidden" name="commentable_id" value="{{$article->id}}">
        <input type="hidden" name="commentable_type" value="{{ get_class($article) }}">

            <div class="col-12">
                <div class="form-group">
                    <textarea rows="3" class="form-control @error('body') is-invalid @enderror" name="body" type="text">{{ old('body') }}</textarea>
                </div>
            </div>
            @error('body')
                <p class="text-danger">
                    {{$message}}
                </p>
            @enderror
        <div class="form-group">
            <button type="submit" class="button button-contactForm">ارسال نظر</button>
        </div>
    </form>
</div>
