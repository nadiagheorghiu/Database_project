@extends('app')
@section('content')
<div class="container">
    <section class="web_site">
        <div class="main_content_section" style="justify-content: center;">
            <div class="row head">
                <div class="col-4 ">
                    <h2 class="header_page">Note Studenti - Tabel Ordonat</h2>
                </div>
            </div>

            <div class="row ">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nume</th>
                            <th>Prenume</th>
                            <th>Nr Prezentari</th>
                            <th>Rata de Promovabilitate</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($studenti as $student)
                        <tr>
                            <td>{{$student->nume}}</td>
                            <td>{{$student->prenume}}</td>
                            <td>{{$student->prezentari}}</td>
                            <td> @php
                                if($student->prezentari){
                                    print(intval($student->promovat/$student->prezentari*100));
                                } else {
                                    print("0");
                                }
                            @endphp%
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section></div>
@endsection