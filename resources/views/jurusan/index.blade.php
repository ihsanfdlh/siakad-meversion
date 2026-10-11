@extends('layouts.header')
@section('title', 'JURUSAN')
@section('content')
<div class="section-heading">
    <div>
        <span class="eyebrow">DATA AKADEMIK</span>
        <h1>Daftar Jurusan</h1>
        <p>Kelola informasi Jurusan yang terdaftar di sistem.</p>
    </div>
    <div>
        <a class="button button-secondary" href="{{ route('jurusan.statistik') }}">Statistik</a>
        <a class="button button-primary" href="{{ route('jurusan.create') }}">+ Tambah Jurusan</a>
    </div>
</div>
@if (session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<div class="table-card">
    <div class="table-top"><strong>Data Jurusan</strong><span class="record-count">{{ $data->count() }} data</span></div>
    <div class="table-scroll"><table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kepala Jurusan</th>
                <th>Sekretaris Jurusan</th>
            </tr>
        </thead>
        <tbody>
                @forelse ($data as $jrsn)
                    <tr>
                        <td class="muted">{{ $loop->iteration }}</td>
                        <td>
                            <strong>{{ $jrsn->nama }}</strong>
                        </td>
                        <td>{{ $jrsn->kajur->nama ?? 'Belum ada Kepala Jurusan' }}</td>
                        <td>{{ $jrsn->sekjur->nama ?? 'Belum ada Sekretaris Jurusan' }}</td>
                        <td>
                            <span class="code-pill"">
                                <a href="{{ route('jurusan.show', $jrsn->id) }}" style="text-decoration: none;">Lihat Detail</a>
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('jurusan.edit', $jrsn->id) }}" class="status-pill" style="text-decoration: none">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('jurusan.destroy', $jrsn->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                @csrf
                                @method('DELETE')

                                <button  class="code-pill" type="submit" style="border: none; cursor:pointer; background-color: #ffebed; color: #ff263b">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="empty-state" colspan="7">
                            <strong>Belum ada data Jurusan</strong>
                            <span>Tambahkan Jurusan pertama untuk mulai mengelola data.</span>
                        </td>
                    </tr>
                @endforelse
        </tbody>
    </table></div>
</div>
@endsection