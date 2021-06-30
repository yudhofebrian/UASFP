<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>
<h1> Data </h1>
<table align="center" width="80%" border="1">
  <tr>
    <th>No</th>
    <th>NIP</th>
    <th>Nama</th>
    <th>Alamat</th>
  </tr>
  @php
  @endphp

  @foreach ($list as $key => $datahp)
    <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $datahp->nip }}</td>
        <td>{{ $datahp->nama }}</td>
        <td>{{ $datahp->alamat }}</td>
    </tr>

  @endforeach
</table>

</body>
</html>
