@extends('add_page/menu_add')

@include('menue/menue')

<div id="4" class="tabcontent">
  <div class="container">
    <h2>ADD MARKS</h2>
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
            <option>{{$student->.....}}</option>
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

      <button type="submit" class="btn btn-primary">Add</button>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Media generala</th>
            <th>Media pe anul curent</th>

          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$student->media_generala}}</td>
            <td>{{$student->media_curenta}}</td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>