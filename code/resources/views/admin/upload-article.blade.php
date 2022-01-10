@extends('layouts.admin')
@section('title')
    Upload Article - 
@endsection

@section('add_css')
{{-- <link rel="stylesheet" href="{{ asset('assets/datepicker/css/bootstrap-datepicker3.min.css') }}"> --}}
<link rel="stylesheet" href="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 d-flex stretch-card grid-margin">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-dark font-weight-bold mb-2 text-center"><i class="mdi mdi-upload"></i> Upload Article</h3>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('save-post') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-8 d-flex stretch-card grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Semangat Upload Artikelnya</h4>
                            <p class="card-description">
                                Isi dengan Ketulusan Hati agar hasil maksimal :)
                            </p>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Judul Artikel">
                                </div>
                                <div class="form-group">
                                    <label for="description">URL Slug</label>
                                    <textarea name="body" class="text-control richTextBox" id="textTiny" cols="30" rows="10"></textarea>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex stretch-card grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="slug">URL Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug Artikel">
                            </div>
                            <div class="form-group">
                                <label for="title">Post Status</label>
                                <select name="status" class="form-control" id="">
                                    <option value="DRAFT">DRAFT</option>
                                    <option value="PUBLISHED">PUBLISH</option>
                                    <option value="PENDING">PENDING</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Date Publish</label>
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control" name="published_at"/>
                                    <span class="input-group-addon">
                                        <span class="btn btn-block btn-primary"><i class="mdi mdi-calendar"></i></span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title">Post Category</label>
                                <select name="category" class="form-control" id="">
                                    @foreach ($category as $item => $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-check-primary">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="featured" checked="0">
                                        Featured
                                    <i class="input-helper"></i></label>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Image Post</label>
                                    <input type="file" name="image" class="form-control">
                                    </div>  
                                </div>
                            <hr>
                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="Meta Keywords">Meta Keywords</label>
                                <textarea name="meta_keywords" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="SEO title">SEO Title</label>
                                <input type="text" class="form-control" id="title" name="seo_title" placeholder="SEO Title">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('add_js')
    <script src="{{ asset('assets/js/tinymce/tinymce.min.js') }}"></script>
    {{-- <script type="text/javascript" src="{{asset('assets/datepicker/js/bootstrap-datepicker.min.js')}}" ></script>   --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
    <script src="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/js/bootstrap-datetimepicker.min.js"></script>

    <script>
        $(document).ready(function(){
            tinymce.init({
                menubar: true,
                selector:'textarea.richTextBox',
                min_height: 600,
                resize: 'vertical',
                plugins: 'link, image, code, youtube, giphy, table, textcolor, visualblocks, fullscreen, autosave, wordcount, paste, searchreplace, codesample',
                extended_valid_elements : 'input[id|name|value|type|class|style|required|placeholder|autocomplete|onclick]',
                codesample_languages: [
                    {text: 'JavaScript', value: 'javascript'}
                ],
                toolbar: 'styleselect bold italic underline | forecolor backcolor | alignleft aligncenter alignright | bullist numlist outdent indent | link image table youtube giphy | code visualblocks fullscreen codesample',
                convert_urls: false,
                image_caption: true,
                image_title: true,
            });

            $('#datetimepicker1').datetimepicker({
                defaultDate: new Date(),
                format: 'DD/MM/YYYY hh:mm:ss A',
                sideBySide: true
            });
        });
    </script>
@endsection