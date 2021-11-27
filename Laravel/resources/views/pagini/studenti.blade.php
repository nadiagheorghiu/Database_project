@extends('app')
@section('content')
<section class="web_site">
    <div class="main_content_section" style="justify-content: center;">
        <div class="row head">
            <div class="col-4 ">
                <h2 class="header_page">Studenti</h2>
            </div>
            <div class="col-5 pt-2">
                <button> <a href="{{route('adaugare_student')}}" class="b bordcolor">Adaugare</a></button>
                <button> <a href="{{route('P4')}}" class="b bordcolor">P.4</a></button>
                <button> <a href="{{route('P6')}}" class="b bordcolor">P.6</a></button>
                <button> <a href="{{route('P8')}}" class="b bordcolor">P.8</a></button>
                <button> <a href="{{route('P9')}}" class="b bordcolor">P.9</a></button>
                <button> <a href="{{route('P10')}}" class="b bordcolor">P.10</a></button>
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
    </div>
</section>
@endsection