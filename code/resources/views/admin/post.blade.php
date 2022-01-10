@extends('layouts.admin')
@section('title')
    Article - 
@endsection
@section('add_css')
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css')}}">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-dark font-weight-bold mb-2 text-center"><i class="mdi mdi-book"></i> Article</h3>
                        <a href="{{ route('upload-article') }}">
                            <button type="button" class="btn btn-danger btn-icon-text btn-block">
                                <i class="mdi mdi-upload btn-icon-prepend"></i>                                                    
                                Upload
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <table class="table table-hover table-bordered" id="post">
                                <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>View</th>
                                    <th>Category</th>
                                    <th>Tanggal Publish</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item => $value)
                                    <tr>
                                        <td>{{ $value->title }}</td>
                                        <td>{{ $value->view }}</td>
                                        <td>{{ $value->category['name'] }}</td>
                                        <td>{{ $value->published_at }}</td>
                                        <td>
                                            @if($value->status == 'PUBLISHED')
                                                <label class="badge badge-success">{{ $value->status }}</label>
                                            @elseif($value->status == 'DRAFT')
                                                <label class="badge badge-danger">{{ $value->status }}</label>
                                            @elseif($value->status == 'PENDING')
                                                <label class="badge badge-warning">{{ $value->status }}</label>
                                            @endif
                                            
                                        </td>
                                        <td>
                                            <a href="#">
                                                <button class="btn btn-inverse-primary btn-rounded btn-icon">
                                                    <i class="mdi mdi-view-headline"></i>
                                                </button>
                                            </a>
                                            <form action="{{ url('mimin/post/delete/'.$value->id) }}" method="GET">
                                                {{ csrf_field() }}
                                                <button class="btn btn-inverse-primary btn-rounded btn-icon">
                                                    <i class="mdi mdi-delete"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('add_js')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#post').DataTable();
        } );
    </script>
@endsection