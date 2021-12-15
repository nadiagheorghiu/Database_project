@extends('app')
@section('content')

<div class="container">
    <section class="web_site" style="justify-content: center;">
        <div class="main_content_section">
            <div class="row head ">
                <div class="col-3 ">
                    <h2 class="header_page" style="text-align: center;">Adaugă un student</h2>
                </div>
            </div>
<br>
            <form id='data' action="{{ route('adaugare_student') }}" method="POST">
                @csrf
                <div class="form-section">
                    <label>Nume:</label>
                    <input name='nume' class="form-control" type="text" required><br>
                </div>
                <div class="form-section">
                    <label>Prenume:</label>
                    <input name='prenume' class="form-control" type="text" required><br>
                </div>
                <div class="form-section">
                    <label>Nr Matricol</label>
                    <input name='legitimatie' class="form-control" type="number" required><br>
                </div>
                <div class="btn-group">
                    <button class="btn btn-primary active" type="submit">Salveaza</button>
                    <button class="btn btn-primary" type="reset">Anuleaza</button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection