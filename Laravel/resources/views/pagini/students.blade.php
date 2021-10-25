<div class="container">
    <h2>TABEL STUDENTI</h2>    
              
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID Student</th>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>StudentNo</th>
        </tr>
      </thead>
      <tbody>
          @forelse ($data as $item)
          <tr>
            <th>{{ $item[0] }}</th>
            <th>{{ $item[1] }}</th>
            <th>{{ $item[2] }}</th>
            <th>{{ $item[3] }}</th>
          </tr>
          @empty
          <h3>No data</h3>
          @endforelse
      </tbody>
    </table>
</div>