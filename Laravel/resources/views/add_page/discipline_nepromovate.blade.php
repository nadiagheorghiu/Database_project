@extends('add_page/menu_add')

@include('menue/menue')

<div id="1" class="tabcontent">
  <h3>Studentii care au discipline nepromovate</h3>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID Student</th>
        <th>Firstname</th>
        <th>Lastname</th>

      </tr>
    </thead>
    <tbody>
      @foreach($studenti as $student)
      <tr>
        <td>{{$student->c_id}}</td>
        <td>{{$student->c_first_name}}</td>
        <td>{{$student->c_last_name}}</td>

      </tr>
      @endforeach

    </tbody>


  </table>
</div>