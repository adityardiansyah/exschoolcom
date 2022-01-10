@extends('master')
@section('title', 'EX - School')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#button-cari").click(function(){
        $("#menu-cari").slideToggle("slow");
    });
});
</script>
<style>
  
</style>
@section('content')
  <section class="cp-jumbotron">
  <div class="container text-center text-header">

        <h2>Label {{ $tag->nama }}</h2>
        
    </div>
    
</section>
  <div class="container top64" style="padding-bottom: 32px;">

  <div class="row">
    <div id="video">
      
      @foreach ($tags as $v)
        <div class="col-md-4">
        <div class="post-item">
          <div class="post-thumb">
            <a href="/video/{{ $v->slug }}"><img src="/storage/{{ $v->gambar }}"></a>
          </div>
          <div class="post-body">
              <?php
                $vid = App\Video::find($v->id);
                  foreach ($vid->tags as $tags) {
                  $color = $tags->warna;

              ?>    
              <div class="post-category">
                  <a class="tags-color" style="background :<?= $color ?>; color: #fff;" href="/tags/{{$tags->slug}}">{{ $tags->nama }}</a>
              </div>
              <?php
                }
              ?>

            <h3 class="post-title">
              <a href="/event/{{ $v->slug }}" class="link-title">{{ $v->judul }}</a>
            </h3>
            <div class="post-info">
              <p class="margin-xs-bottom">
                <span class="post-time-upcoming">
                  <span class="fa fa-calendar fa-fw"></span>
                  {{ date("F j, Y ", strtotime($v->cretaed_at)) }}
                </span>
              </p>
            </div>

        </div>
      </div>
      </div>
        
      @endforeach
      
    </div>

  </div>
  </div>
@endsection
