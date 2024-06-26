@extends('layouts.app')

@section('title') New Information @endsection

@section('label') READ THE DETAILS @endsection

@section('titlemenu') Single Article @endsection

@section('content')
<div class="mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-article-section">
                    <div class="single-article-text">
                        {{-- <div class="single-artcile-bg"> --}}
                            <img class="single-artcile-bg" src="{{ asset($newinformation->image) }}" alt="" width="100%">
                        {{-- </div> --}}
                        
                        <p class="blog-meta">
                            <span class="author"><i class="fas fa-user"></i> {{ $newinformation->user->role }}</span>
                            <span class="date"><i class="fas fa-calendar"></i> {{ $newinformation->created_at }}</span>
                        </p>
                        <h2>{{ $newinformation->title }}</h2>
                        <p>{{ $newinformation->desc }}</p>
                    </div>
                    <p class="mt-5"><a href="{{ route('page.index') }}"><input type="submit" value="Back"></a></p>
                  

                    {{-- <div class="comments-list-wrap">
                        <h3 class="comment-count-title">3 Comments</h3>
                        <div class="comment-list">
                            <div class="single-comment-body">
                                <div class="comment-user-avater">
                                    <img src="assets/img/avaters/avatar1.png" alt="">
                                </div>
                                <div class="comment-text-body">
                                    <h4>Jenny Joe <span class="comment-date">Aprl 26, 2020</span> <a href="#">reply</a></h4>
                                    <p>Nunc risus ex, tempus quis purus ac, tempor consequat ex. Vivamus sem magna, maximus at est id, maximus aliquet nunc. Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus.</p>
                                </div>
                                <div class="single-comment-body child">
                                    <div class="comment-user-avater">
                                        <img src="assets/img/avaters/avatar3.png" alt="">
                                    </div>
                                    <div class="comment-text-body">
                                        <h4>Simon Soe <span class="comment-date">Aprl 27, 2020</span> <a href="#">reply</a></h4>
                                        <p>Nunc risus ex, tempus quis purus ac, tempor consequat ex. Vivamus sem magna, maximus at est id, maximus aliquet nunc. Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-comment-body">
                                <div class="comment-user-avater">
                                    <img src="assets/img/avaters/avatar2.png" alt="">
                                </div>
                                <div class="comment-text-body">
                                    <h4>Addy Aoe <span class="comment-date">May 12, 2020</span> <a href="#">reply</a></h4>
                                    <p>Nunc risus ex, tempus quis purus ac, tempor consequat ex. Vivamus sem magna, maximus at est id, maximus aliquet nunc. Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus Suspendisse lacinia velit a eros porttitor, in interdum ante faucibus.</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="comment-template">
                        <h4>Leave a comment</h4>
                        <p>If you have a comment dont feel hesitate to send us your opinion.</p>
                        <form action="index.html">
                            <p>
                                <input type="text" placeholder="Your Name">
                                <input type="email" placeholder="Your Email">
                            </p>
                            <p><textarea name="comment" id="comment" cols="30" rows="10" placeholder="Your Message"></textarea></p>
                            <p><input type="submit" value="Submit"></p>
                        </form>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-section">
                    <div class="recent-posts">
                        <h4>Recent Posts</h4>
                        <ul>
                            <li><a href="#">{{ $newinformation->recent_1 }}</a></li>
                            <li><a href="#">{{ $newinformation->recent_2 }}</a></li>
                            <li><a href="#">{{ $newinformation->recent_3 }}</a></li>
                            <li><a href="#">{{ $newinformation->recent_4 }}</a></li>
                            <li><a href="#">{{ $newinformation->recent_5 }}</a></li>
                        </ul>
                    </div>
                    <div class="archive-posts">
                        <h4>Archive Posts</h4>
                        <ul>
                            <li><a href="#">{{ $newinformation->archive_1 }}</a></li>
                            <li><a href="#">{{ $newinformation->archive_2 }}</a></li>
                            <li><a href="#">{{ $newinformation->archive_3 }}</a></li>
                            <li><a href="#">{{ $newinformation->archive_4 }}</a></li>
                            <li><a href="#">{{ $newinformation->archive_5 }}</a></li>
                        </ul>
                    </div>
                    <div class="tag-section">
                        <h4>Tags</h4>
                        <ul>
                            @foreach ($categories as $categorie)
                                  <li><a href="#">{{ $categorie->title }}</a></li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection