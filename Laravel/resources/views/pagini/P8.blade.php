@extends('app')
@section('content')
<section class="web_site" style="justify-content: center;">
    <div class="main_content_section" style="justify-content: center;">
        <div class="row head">
            <div class="col-4 ">
                <h2 class="header_page">Promovabilitate</h2>
            </div>
        </div>


     
            <div class="container">
                <h2>Choose Disciplina</h2>
                <form>

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
                    </div>
                <br>
                <br> 
                <br>
                <br>

                    <div class="btn-group">
                        <input class="b bordcolor" type="reset" value="Anulare">
                        <input class="a bcolor" type="submit" value="Adauga">
                    </div>
                    <h3>Promovabilitatea este de: ...%</h3>
                </form>
            </div>
        </div>
 
</section>
@endsection