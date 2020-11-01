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
      td,th {
          border: 1px solid rgb(190, 190, 190);
          padding: 5px 10px;
      }
      td {
          text-align: center;
      }
      .center {
        text-align: center;
      }
    </style>
    <link rel="stylesheet" href="">
    <title>Laporan Data Buku</title>
  </head>
  <body>
    <h3 class="center">LAPORAN DATA BUKU</h3>
    <table id="pseudo-demo">
      <thead>
        <tr>
          <th>Judul</th>
          <th>ISBN</th>
          <th>Pengarang</th>
          <th>Penerbit</th>
          <th>Tahun</th>
          <th>Stok</th>
          <th>Rak</th>
        </tr>
      </thead>
      <tbody>
        @foreach($datas as $data)
        <tr>
          <td>{{$data->judul}}</td>
          <td>{{$data->isbn}}</td>
          <td>{{$data->pengarang}}</td>
          <td>{{$data->penerbit}}</td>
          <td>{{$data->tahun_terbit}}</td>
          <td>{{$data->jumlah_buku}}</td>
          <td>{{$data->lokasi}}</td>
        </tr>
       @endforeach
      </tbody>
    </table>
  </body>
</html>