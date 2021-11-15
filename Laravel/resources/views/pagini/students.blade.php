@extends('app') 

@section('content')

<div class="container">
  <h2>TABEL STUDENTI</h2>

  <table class="table table-striped">
  <thead>
      <tr>
        <th>ID Student</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Nr Matricol</th>
        <!--<th>An Studiu</th>-->
      </tr>
    </thead>
    <tbody>
      @foreach($studenti as $student)
      <tr>
        <td>{{$student->id}}</td>
        <td>{{$student->nume}}</td>
        <td>{{$student->prenume}}</td>
        <td>{{$student->legitimatie}}</td>
      </tr>
      @endforeach

    </tbody>
  </table>
</div>

@endsection