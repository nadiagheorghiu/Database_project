@extends('app')
@section('content')
<section class="web_site">
    <div class="main_content_section" style="justify-content: center;">
        <div class="row head">
            <div class="col-4 ">
                <h2 class="header_page">Date Generale Studenti</h2>
            </div>
        </div>

        <div class="row ">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nume</th>
                        <th>Prenume</th>
                        <th>An Studiu</th>
                        <th>Nr Matricol</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($studenti as $student)
                    <tr>
                        <td>{{$student->nume}}</td>
                        <td>{{$student->prenume}}</td>
                        <td>{{$student->an_studiu}}</td>
                        <td>{{$student->legitimatie}}</td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection