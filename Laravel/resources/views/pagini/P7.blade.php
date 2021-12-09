@extends('app')
@section('content')
<div class="container">
<section class="web_site">
    <div class="main_content_section" style="justify-content: center;">
        <div class="row head">
            <div class="col-4 ">
                <h2 class="header_page">Note</h2>
            </div>
            <div class="col-5 pt-2">
                <button> <a href="{{route('note')}}" class="b bordcolor">Lista note</a></button>
                <button> <a href="{{route('adaugare_nota')}}" class="b bordcolor">P.7</a></button>
            </div>
        </div>
        @if($errors->any())
            <h4 style="color: red">{{$errors->first()}}</h4>
        @endif
        @isset($nume_student)
            <div class="row head">
                <div class="col-4 ">
                    <h2 class="header_page">{{ $nume_student }}</h2>
                </div>
            </div>

            <div class="row ">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Media pe anul 1</th>
                            <th>Media pe anul 2</th>
                            <th>Media pe anul 3</th>
                            <th>Media generala</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$medie1}}</td>
                            <td>{{$medie2}}</td>
                            <td>{{$medie3}}</td>
                            <td>{{$medie_gen}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @else
            <div class="row head">
                <div class="col-4 ">
                    <h2 class="header_page">Lista medii studenti</h2>
                </div>
            </div>
            <div class="row ">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nume</th>
                            <th>Prenume</th>
                            <th>Media pe anul 1</th>
                            <th>Media pe anul 2</th>
                            <th>Media pe anul 3</th>
                            <th>Media generala</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($studenti as $student)
                            <tr>
                                <td>{{ $student->nume }}</td>
                                <td>{{ $student->prenume }}</td>
                                <td>{{ number_format($student->medie1, 2) }}</td>
                                <td>{{ number_format($student->medie2, 2) }}</td>
                                <td>{{ number_format($student->medie3, 2) }}</td>
                                <td>{{ number_format($student->medie_gen, 2) }}</td>
                            </tr>                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endisset
    </div>
</section>
</div>
@endsection