@extends('Characters.layout')
@section('content')
<h4 class="mt-5">Data Character Dump File</h4>
<a href="{{ route('Characters.index') }}" type="button"
class="btn btn-success rounded-3">Kembali</a>
<div class = "row g-3 align-items-center mt-2">
<div class = "col-auto">
    <form action="/Characters" method="GET">
    <input type="search" name="search" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
    </form>
</div>
<table class="table table-hover mt-2">
 <thead>
 <tr>
    <th>ID Character</th>
    <th>Name</th>
    <th>Damage Type</th>
    <th>School name</th>
    <th>Action</th>
 </tr>
 </thead>
 <tbody>
 @foreach ($datasi as $data)
 <tr>
<td>{{$data-> ID_Character}}</td>
<td>{{$data-> Name }}</td>
<td>{{$data-> damage_type }}</td>
<td>{{$data-> Name_School }}</td>
 <td>
 <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#kembalikanModal{{ $data->ID_Character }}">
    Kembalikan
</button>
 <!-- TAMBAHKAN KODE DELETE DIBAWAH 
BARIS INI -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->ID_Character }}">
 Hapus Beneran
</button>
 <!-- Modal -->
 <div class="modal fade" 
id="hapusModal{{ $data->ID_Character }}" tabindex="-1" 
aria-labelledby="hapusModalLabel" aria-hidden="true">
 <div class="modal-dialog">
 <div class="modal-content">
 <div class="modal-header">
 <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
 <button 
type="button" class="btn-close" data-bs-dismiss="modal" 
aria-label="Close"></button>
 </div>
<form method="POST" 
action="{{ route('Characters.hardDelete', $data->ID_Character) }}">
 @csrf
<div class="modal-body">
 Apakah anda 
yakin ingin menghapus permanen data ini?
 </div>
 <div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
 <button type="submit" class="btn btn-primary">Ya</button>
 </div>


 </form>
 </div>
 </div>
 </div>
 <div class="modal fade" 
id="kembalikanModal{{ $data->ID_Character }}" tabindex="-1" 
aria-labelledby="kembalikanModalLabel" aria-hidden="true">
 <div class="modal-dialog">
 <div class="modal-content">
 <div class="modal-header">
 <h5 class="modal-title" id="kembalikanModalLabel">Konfirmasi</h5>
 <button 
type="button" class="btn-close" data-bs-dismiss="modal" 
aria-label="Close"></button>
 </div>
<form method="POST" 
action="{{ route('Characters.restore', $data->ID_Character) }}">
 @csrf
<div class="modal-body">
 Apakah anda 
yakin ingin mengembalikan data ini?
 </div>
 <div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
 <button type="submit" class="btn btn-primary">Ya</button>
 </div>
 </form>
 </div>
 </div>
 </div>

 </td>
 @endforeach
 </tbody>
</table>
@stop