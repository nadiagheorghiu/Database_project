@extends('app')
@section('content')

<section class="web_site">
    <div class="main_content_section" style="justify-content: center;">
    <div class="row head">
            <div class="col-4 ">
                <h2 class="header_page">Media</h2> <br>
            </div>
        </div>
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for=" ">Nume</label>
                    <input type="text" class="form-control" placeholder="Nume">
                </div>
                <div class="form-group col-md-6">
                    <label for=" ">Prenume</label>
                    <input type="text" class="form-control" placeholder="Prenume">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Disciplina</label>
                    <select id=" " class="form-control">
                        <option selected>ss...</option>
                        <option>...</option>
                        <option>...</option>
                        <option>...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Examen</label>
                    <select id=" " class="form-control">
                        <option selected>Choose...</option>
                        <option>sss</option>
                        <option>...</option>

                        <option>...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="">Nota</label>
                    <input type="number" class="form-control" id=" " placeholder="Nota">
                </div>
            </div>

            <div class="btn-group">
                <input class="b bordcolor" type="reset" value="Anulare">
                <input class="a bcolor" type="submit" value="Adauga">
            </div>
            <br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Media generala</th>
                        <th>Media pe anul curent</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>dded</td>
                        <td> ds</td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</section>
@endsection