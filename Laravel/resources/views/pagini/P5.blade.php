@extends('app')
@section('content')
<div class="container">
<section class="web_site">
    <div class="main_content_section" style="justify-content: center;">
        <div class="row head">
            <div class="col-4 ">
                <h2 class="header_page" style="text-align: center;">Date Generale despre Studenți</h2>
            </div>
        </div>
<br><br>
        <div class="row ">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nume</th>
                        <th>Prenume</th>
                        <th>Număr Matricol</th>
                        <th>An Studiu</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($studenti as $student)
                    <tr>
                        <td>{{$student->nume}}</td>
                        <td>{{$student->prenume}}</td>
                        <td>{{$student->legitimatie}}</td>
                        <td>{{$student->an}}</td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</section>
</div>
@endsection