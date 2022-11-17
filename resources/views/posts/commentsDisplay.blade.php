@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->body }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="body" class="form-control" />
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @include('posts.commentsDisplay', ['comments' => $comment->replies])
    </div>
@endforeach

{{--@foreach($comments as $comment)--}}
{{--<div class="card card-danger direct-chat direct-chat-danger">--}}

{{--    <!-- /.card-header -->--}}
{{--    <div class="card-body">--}}
{{--        <!-- Conversations are loaded here -->--}}

{{--        @if($comment->parent_id == null)--}}
{{--        <div class="direct-chat-messages">--}}
{{--            <!-- Message. Default to the left -->--}}
{{--            <div class="direct-chat-msg">--}}
{{--                <div class="direct-chat-infos clearfix">--}}
{{--                    <span class="direct-chat-name float-left">{{ $comment->user->name }}</span>--}}
{{--                    <span class="direct-chat-timestamp float-right">{{ $comment->created_at }}</span>--}}
{{--                </div>--}}

{{--                <img class="direct-chat-img" src="{{asset('/docs/assets/img/user1-128x128.jpg')}}" alt="message user image">--}}

{{--                <div class="direct-chat-text">--}}
{{--                    {{ $comment->body }}--}}
{{--                </div>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--            @if($comment->parent_id != null)--}}
{{--            <div class="direct-chat-msg right">--}}
{{--                <div class="direct-chat-infos clearfix">--}}
{{--                    <span class="direct-chat-name float-right">{{ $comment->user->name }}</span>--}}
{{--                    <span class="direct-chat-timestamp float-left">{{ $comment->created_at }}</span>--}}
{{--                </div>--}}
{{--                <!-- /.direct-chat-infos -->--}}
{{--                <img class="direct-chat-img" src="{{asset('/docs/assets/img/user3-128x128.jpg')}}" alt="message user image">--}}
{{--                <!-- /.direct-chat-img -->--}}
{{--                <div class="direct-chat-text">--}}
{{--                    {{ $comment->body }}--}}
{{--                </div>--}}
{{--                <!-- /.direct-chat-text -->--}}
{{--            </div>--}}
{{--            @endif--}}

{{--    <div class="card-footer">--}}
{{--        <form action="{{ route('comments.store') }}" method="post">--}}
{{--            @csrf--}}
{{--            <div class="input-group">--}}
{{--                <input type="text" name="body"  placeholder="Type Message..." class="form-control">--}}
{{--                <input type="hidden" name="post_id" value="{{ $post_id }}" />--}}
{{--                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />--}}
{{--                <span class="input-group-append"><button type="submit" class="btn btn-primary">Send</button></span>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--        @include('posts.commentsDisplay', ['comments' => $comment->replies])--}}
{{--    </div>--}}

{{--</div>--}}

{{--@endforeach--}}
