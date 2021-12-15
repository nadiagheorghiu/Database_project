@extends('app')

@section('content')

<div class="container">
    <section class="web_site">
        <div class="main_content_section" style="justify-content: center;">
            <div class="row head">
            <div class="col-4 ">
                    <h2 class="header_page" style="text-align: center;">Proiect PBD Tema 10</h2>
                </div>
                <div class="col-4 ">
                    <h2 class="header_page" style="text-align: center;">Studenți</h2>
                </div>
                <br>
                <div class="col-5 pt-2">
                    
                    <a href="{{route('adaugare_student')}}" class="btn btn-primary  active" role="button" aria-pressed="true">Adăugare Student</a>
                    <a href="{{route('P4')}}" class="btn btn-primary  active" role="button" aria-pressed="true">P.4</a>
                    <a href="{{route('P5')}}" class="btn btn-primary  active" role="button" aria-pressed="true">P.5</a>
                    <a href="{{route('P6')}}" class="btn btn-primary  active" role="button" aria-pressed="true">P.6</a>
                    <a href="{{route('P8')}}" class="btn btn-primary  active" role="button" aria-pressed="true">P.8</a>
                    <a href="{{route('P9')}}" class="btn btn-primary  active" role="button" aria-pressed="true">P.9</a>
                    <a href="{{route('P10')}}" class="btn btn-primary active" role="button" aria-pressed="true">P.10</a>

                </div>
            </div>
<br><br>
            <div class="row ">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID Student</th>
                            <th>Nume</th>
                            <th>Prenume</th>
                            <th>Număr Matricol</th>
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
        </div>
    </section>
</div>
@endsection