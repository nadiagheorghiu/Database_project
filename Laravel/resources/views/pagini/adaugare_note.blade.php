@extends('app')

@section('content')

<div class="container">
    <section class="web_site" style="justify-content: center;">
        <div class="main_content_section">
            <div class="row head">
                <div class="col-4 ">
                    <h2 class="header_page" style="text-align: center;">Note</h2>
                </div>
                <br>
                <div class="col-5 pt-2">
                    <a href="{{route('note')}}" class="btn btn-primary active" role="button" aria-pressed="true">Lista note</a>
                    <a href="{{route('adaugare_nota')}}" class="btn btn-primary active" role="button" aria-pressed="true">Adauga Nota</a>
                </div>
            </div>

            @isset($examene)
            <div class="row head">
                <div class="col-3 ">
                    <h2 class="header_page">Adaugă o nota</h2>
                </div>
            </div>
            <form method="POST" action="{{route('note')}}">
                @csrf
                <input name="id_student" type="hidden" value="{{ $student_id }}">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Selecteaza examen:</label>
                        <select name="id_examen" id="id_examen" class="form-control" required>
                            @foreach ($examene as $examen)
                            @if ($examen == $examene[0])
                            <option value="{{ $examen->ex }}" selected>
                                {{ $examen->nume_disciplina }} {{ $examen->numar_prezentare }}
                            </option>
                            @else
                            <option value="{{ $examen->ex }}">
                                {{ $examen->nume_disciplina }} {{ $examen->numar_prezentare }}
                            </option>
                            @endif
                            @endforeach
                        </select>
                    <br>
                <div class="form-section">
                    <label>Nota</label>
                    <input name="nota" class="form-control" type="number" required><br>
                </div>
                </div>
                </div>
                <br><br><br><br><br><br><br><br><br>
                <div class="btn-group">
                    <input class="btn btn-primary active" type="submit" value="Trimite">
                    <input class="btn btn-primary" type="reset" value="Anulare">
                </div>
            </form>
            @else
            <div class="row head ">
                <div class="col-3 ">
                    <h2 class="header_page">Selecteaza student</h2>
                </div>
            </div>
            <form method="POST" action="{{ route('adaugare_nota') }}">
                @csrf
                <div class="form-section">
                    <label>Nume:</label>
                    <input name="nume" class="form-control" type="text"><br>
                </div>
                <div class="form-section">
                    <label>Prenume:</label>
                    <input name="prenume" class="form-control" type="text"><br>
                </div>
                <div class="btn-group">
                    <input class="btn btn-primary active" type="submit" value="Trimite">
                    <input class="btn btn-primary active" type="reset" value="Anulare">
                </div>
            </form>
            @endisset
        </div>
    </section>
</div>
@endsection