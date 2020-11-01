<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style type="text/css">
    thead, tfoot {
      background-color: #3f87a6;
      color: #fff;
    }

    tbody {
        background-color: #e4f0f5;
    }
    caption {
        padding: 10px;
        caption-side: bottom;
    }

    table {
        border-collapse: collapse;
        border: 2px solid rgb(200, 200, 200);
        letter-spacing: 1px;
        font-family: sans-serif;
        font-size: .8rem;
    }

    td,
    th {
        border: 1px solid rgb(190, 190, 190);
        padding: 5px 10px;
    }

    td {
        text-align: center;
    }

    .center {
    	text-align: center;
    }
    .badge {
      display: inline-block;
      padding: 0.25em 0.4em;
      font-size: 75%;
      font-weight: 700;
      line-height: 1;
      text-align: center;
      white-space: nowrap;
      vertical-align: baseline;
      border-radius: 0.25rem; 
    }
    .badge-warning {
      color: #212529;
      background-color: #ffaf00; 
    }
    .badge-warning[href]:hover, .preview-list .preview-item .preview-thumbnail [href].badge.badge-busy:hover, .badge-warning[href]:focus, .preview-list .preview-item .preview-thumbnail [href].badge.badge-busy:focus {
      color: #212529;
      text-decoration: none;
      background-color: #cc8c00; 
    }
    .badge-success, .preview-list .preview-item .preview-thumbnail .badge.badge-online {
      color: #fff;
      background-color: #00ce68; 
    }
    .badge-success[href]:hover, .preview-list .preview-item .preview-thumbnail [href].badge.badge-online:hover, .badge-success[href]:focus, .preview-list .preview-item .preview-thumbnail [href].badge.badge-online:focus {
      color: #fff;
      text-decoration: none;
      background-color: #009b4e; 
    }
	</style>
  <link rel="stylesheet" href="">
	<title>Laporan Data Transaksi</title>
</head>
<body>
  <h3 class="center">LAPORAN DATA TRANSAKSI SIPERPUS</h3>
  <table">
    <thead>
      <tr>
        <th>Kode Transaksi</th>
        <th>Buku</th>
        <th>Peminjam</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Status</th>
      </tr>
    </thead>  
    <tbody>
      @foreach($datas as $data)
        <tr>
          <td class="py-1">{{$data->kode_transaksi}}</td>
          <td>{{$data->buku->judul}}</td>
          <td>{{$data->anggota->nama}}</td>
          <td>{{date('d/m/y', strtotime($data->tgl_pinjam))}}</td>
          <td>{{date('d/m/y', strtotime($data->tgl_kembali))}}</td>
          <td>
            @if($data->status == 'pinjam')
              <label class="badge badge-warning">Pinjam</label>
            @else
              <label class="badge badge-success">Kembali</label>
            @endif
          </td>  
        </tr>   
      @endforeach
    </tbody>
  </table>
</body>
</html>