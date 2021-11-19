@extends('app')
@section('content')
<section class="web_site">
    <div class="main_content_section">
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
                        <td>{{$student->c_first_name}}</td>
                        <td>{{$student->c_last_name}}</td>
                        <td> 2</td>
                        <td>70% </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection