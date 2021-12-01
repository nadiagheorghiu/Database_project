@extends('app')
@section('content')
<div class="container">
    <section class="web_site">
        <div class="main_content_section" style="justify-content: center;">
            <div class="row head">
                <div class="col-4 ">
                    <h2 class="header_page">Studentii doar cu note sub 5, la materii din 2 ani consecutivi</h2>
                </div>
            </div>

            <div class="row ">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nume</th>
                            <th>Prenume</th>
                            <th>Nr Matricol</th>
                            <th>Anii</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($studenti as $student)
                        <tr>
                            <td>{{$student->nume}}</td>
                            <td>{{$student->prenume}}</td>
                            <td>{{$student->legitimatie}}</td>
                            <td>
                                @if($student->nota_an_1)
                                    1
                                @endif 
                                @if ($student->nota_an_2)
                                    2
                                @endif 
                                @if ($student->nota_an_3)
                                    3
                                @endif
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section></div>
@endsection