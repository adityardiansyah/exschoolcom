@extends('master')

@section('title','Voting Ekstrakulikuler - EX - SCHOOL')

@section('content')
<div class="container-fluid top96">
  <h1 align="center">Vote Satuan Paskibra Jawa Barat</h1>
  <h1 align="center">Terpopuler 2018</h1>
  <div class="col-md-8 col-md-offset-2">
              @if($message = Session::get('berhasil'))
                            <div class="alert alert-success">
                              <p>
                                {{ $message }}
                              </p>
                            </div>
                            @endif
                            @if($message = Session::get('gagal'))
                              <div class="alert alert-danger">
                                <p>
                                  {{ $message }}
                                </p>
                              </div>
                            @endif
                            @if($message = Session::get('error'))
                              <div class="alert alert-danger">
                                <p>
                                  {{ $message }}
                                </p>
                              </div>
                            @endif
                            @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              @if($message = Session::get('cookie'))
                <div class="alert alert-danger">
                                <p>
                                  {{ $message }}
                                </p>
                              </div>
              @endif
    <div class="alert alert-info">
       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p>
              Silakan pilih Ekstrakulikuler yang kamu Sukai
            </p>
            <ul>
              <li>User Boleh memilih lebih dari 1 Ekstrakulikuler</li>
              <li>User/Perangkat hanya bisa melakukan Votting 1 Kali! </li>
              <li>Masukkan Validasi E-Mail yang Aktif !</li>
            </ul>
          </div>
          <div class="row">
            <form action="/kirim-voting" method="post">
              @foreach($nama->all() as $vot)
              <div class="col-md-4">
                <div class="box-voting">
                  <div class="box-image img-responsive" style="background-image: url('/storage/{{ $vot->gambar }}'); background-position: center; position: relative; border-radius: 2px;">
                    <div class="box-like">
                      <?php
                          $nol =0;
                          $vote = App\Vote::where('nama_vote_id','=',$vot->id)->count();
                          $hitung = round($vote/100* 100)."%";
                      ?>
                      <b style="padding: 8px;">{{ $vote }} Likes </b>
                          
                    </div>
                  </div>
                  <div class="box-title">
                    <div class="left" style="width: 95%;"><b>{{ $vot->nama }}</b></div>
                    <div style="float: right; width: 5%;">
                      
                        
                        <input type="checkbox" name="vote" class="checkbox" value="{{ $vot->id}}" id="myCheckbox" @if(Cookie::get('vote') != false){  disabled=""   } @endif>
                      
                    </div>
                    </div>
                  </div>
              </div>
                  
              @endforeach
              <br>
              <br>
            <div class="row" style="margin-top:32px;">
              
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="col-md-12" style="margin-top:32px;">
                  <div class="g-recaptcha" data-sitekey="6LeFtW0UAAAAAPTGxw3B4Xlcr-VTokrS8F91Loe7"></div>
                  <!--<label>Validasi Email</label>-->
                    <div class="input-group text-center">

                      <!--<input type="email" class="form-control" name="email" required placeholder="Masukkan Email anda...">-->
                      <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit" id="btnSubmit">Voting Sekarang</button>
                      </span>
                    </div><!-- /input-group -->
                    <!--<label><span>*Harap masukkan Email AKTIF</span></label>-->
                  </div><!-- /.col-lg-6 -->

              
              </form>
            </div>       
          </div>
          <hr>
    <div class="table-responsive" id="myTable">
      
      <table class="table table-hover">
          <tr>
            <th width="20%">Nama Satuan</th>
            <th width="75%">Total Voting</th>
          </tr>
          @foreach($nama->all() as $na)
          <tr>
            <td>{{ $na->nama }}</td>
            <td>
            <?php
              $nol =0;
              $vote = App\Vote::where('nama_vote_id','=',$na->id)->count();
              $hitung = round($vote/100* 100)."%";
            ?>
              <div class="progress">
              <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?= $hitung ?>;">
                {{ $hitung }} ({{ $vote }} Orang)
                <span class="sr-only">40% Complete (success)</span>
              </div>
              {{ $hitung }} ({{ $vote }} Orang)
            </div>

            </td>
          </tr>
          @endforeach
      </table>
      
      <br>
        <br>
    </div>
  </div>
</div>
{{-- <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div> --}}
<br>
<br>
@endsection
@section('js')
<script>
$(document).ready(function(){
  $("#pop-up").css("display", "none");
  $("#btnSubmit").click(function(){
    $('#myModal').modal('show');
  });
});

</script>

@endsection
