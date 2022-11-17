@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center text-success">Nicesnippets.com</h3>
                        <br/>
                        <h2>{{ $post->title }}</h2>
                        <p>
                            {{ $post->body }}
                        </p>
                        <hr />
                        <div class="card-header">
                            <h3 class="card-title">Direct Chat</h3>
                            <div class="card-tools">
                                <span data-toggle="tooltip" title="3 New Messages" class="badge badge-light">3</span>
                                <button type="button" class="btn btn-tool" data-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                                    <i class="fas fa-comments"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>

                        @include('posts.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])

                        <hr />
                        <h4>Add comment</h4>
{{--                        <form method="post" action="{{ route('comments.store'   ) }}">--}}
{{--                            @csrf--}}
{{--                            <div class="form-group">--}}
{{--                                <textarea class="form-control" name="body"></textarea>--}}
{{--                                <input type="hidden" name="post_id" value="{{ $post->id }}" />--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="submit" class="btn btn-success" value="Add Comment" />--}}
{{--                            </div>--}}
{{--                        </form>--}}

                        <div class="card-footer">
                            <form action="{{ route('comments.store') }}" method="post">
                                @csrf
                                <div class="input-group">
                                    <input type="text" name="body" placeholder="Type Message..." class="form-control">
                                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                    <span class="input-group-append"><button type="submit" class="btn btn-primary">Send</button></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
