<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <div class="col-md-6">
                <select name="buku_id[]" id="" class="selectpicker form-control col-12" multiple data-live-search="true" >
                    @foreach($buku as $buku)
                      <option value="{{$buku['id']}}">
                        Nama Buku : {{$buku['judul']}} <br>
                        Penerbit Buku : {{$buku['penerbit']}} <br> 
                        Pengarang Buku : {{$buku['nama']}}</option>
                    @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>