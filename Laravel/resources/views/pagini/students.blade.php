@extends('app') @section('content')

<div class="container">
  <h2>TABEL STUDENTI</h2>

  <table class="table table-striped">
  <thead>
      <tr>
        <th>ID Student</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>An Studiu</th>
        <th>Nr Matricol</th>
      </tr>
    </thead>
    <tbody>
      @foreach($studenti as $student)
      <tr>
        <td>{{$student->c_id}}</td>
        <td>{{$student->c_first_name}}</td>
        <td>{{$student->c_last_name}}</td>
        <td>{{$student->c_an_studiu}}</td>
        <td>{{$student->c_nr_matricol}}</td>
      </tr>
      @endforeach

    </tbody>
  </table>
</div>
