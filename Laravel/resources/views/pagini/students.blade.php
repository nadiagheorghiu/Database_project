@extends('app') @section('content')

<div class="container">
    <h2>TABEL STUDENTI</h2>    
              
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID Student</th>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>StudentNo</th>
        </tr>
      </thead>
      <tbody>
          @isset($data)
            @forelse ($data as $item)
            <tr>
                <th>{{ $item->id }}</th>
                <th>{{ $item->nume }}</th>
                <th>{{ $item->prenume }}</th>
                <th>{{ $item->legitimatie }}</th>
            </tr>
            @empty
            <h3>No data</h3>
            @endforelse
          @endisset   
      </tbody>
    </table>
</div>

@endsection