@extends('app') 

@section('content')
<body>
    <div class="signup-form">
        <form action="{{ route('form/save') }}" method="post">
            @csrf
            <h2>Form Basic</h2>
            <hr>
            <div class="form-groups">
                <div class="input-group">
                    <label for="name" class="col-sm-2 col-form-label">Full Name *</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter your name">
                </div>
            </div>
        
            <div class="input-group form-check-inline">
                <label for="name" class="col-sm-2 col-form-label">Gender *</label>
                <label class="radio">
                    <input type="radio" class="" name="gander" value="male">
                    <span>Male</span>
                </label>
                <label class="radio">
                    <input type="radio" class="" name="gander" value="female">
                    <span>Female</span>
                </label>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <label for="name" class="col-sm-2 col-form-label">Age *</label>
                    <input type="number" class="form-control @error('age') is-invalid @enderror"value="{{ old('age') }}" name="age" placeholder="Enter your age">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <label for="name" class="col-sm-2 col-form-label">Email *</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <label for="name" class="col-sm-2 col-form-label">Document *</label>
                    <input type="file" class="form-control @error('upload') is-invalid @enderror" name="upload" value="{{ old('upload') }} placeholder="Enter your email" multiple>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 col-form-label"></label>
                <button type="submit" class="btn btn-primary btn-lg">Save</button>
            </div>
        </form>
    </div>
    <div class="container" style="display: none">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Path Name</th>
                    <th>File Name</th>
                    <th>Date Time</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</body>
@endsection