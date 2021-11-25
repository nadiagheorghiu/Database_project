@extends('app')
@section('content')

<section class="web_site" style="justify-content: center;">
    <div class="main_content_section">
        <div class="row head ">
            <div class="col-3 ">
                <h2 class="header_page">Adauga o nota</h2>
            </div>
        </div>

        <form method="post">
            <div class="form-section">
                <label>Nume:</label>
                <input class="form-control" type="text"><br>
            </div>
            <div class="form-section">
                <label>Prenume:</label>
                <input class="form-control" type="text"><br>
            </div>
            <div class="form-section">
                <label>Disciplina:</label>
                <select class="form-control">
                    <option selected>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
            </div>
            <div class="form-section">
                <label>Examen:</label>
                <select class="form-control">
                    <option selected>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
            </div>
            <div class="form-section">
                <label>Nota</label>
                <input class="form-control" type="number"><br>
            </div>
            <div class="btn-group">
                <input class="b bordcolor" type="reset" value="Anulare">
                <input class="a bcolor" type="submit" value="Trimite">
            </div>
        </form>
    </div>
</section>
@endsection