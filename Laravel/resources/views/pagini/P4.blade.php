@extends('app')
@section('content')
<section class="web_site">
    <div class="main_content_section">
        <div class="row head">
            <div class="col-4 ">
                <h2 class="header_page">Studentii care au discipline nepromovate</h2>
            </div>

        </div>

        <div class="row ">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Student</th>
                        <th>Nume</th>
                        <th>Prenume</th>
                        <th>An Studiu</th>
                        <th>Nr Matricol</th>
                        <th>Disciplina</th>
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
                        <td>{{$student->c_disciplina}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection