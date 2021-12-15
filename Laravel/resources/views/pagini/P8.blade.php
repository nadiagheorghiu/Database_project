@extends('app')
@section('content')
<div class="container">
    <section class="web_site" style="justify-content: center;">
        <div class="main_content_section" style="justify-content: center;">
            <div class="row head">
                <div class="col-4 ">
                    <h2 class="header_page" style="text-align: center;">Promovabilitate</h2>
                </div>
            </div>     
            <br>
                <div class="container">
                    <h2>Alege Disciplina</h2>
                    <form method="POST"  action="{{ route('P8') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Disciplina</label>
                                <select name="disciplina" id="disciplina" class="form-control">
                                    @foreach ($select_options as $select_option)
                                        @if ($select_option == $select_options[0])
                                            <option value="{{ $select_option->nume_disciplina }}" selected>
                                                {{ $select_option->nume_disciplina }}</option>
                                        @else
                                            <option value="{{ $select_option->nume_disciplina }}">
                                                {{ $select_option->nume_disciplina }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <br><br>
                        <br>
                       
                            <button class="btn btn-primary  active" type="submit">Incarca</button>
                       
                        @isset($rata)
                            <h3>Promovabilitatea la disciplina "{{ $disciplina }}" este de: {{ $rata }}%</h3>                        
                        @endisset
                    </form>
                </div>
            </div>    
    </section></div>
@endsection