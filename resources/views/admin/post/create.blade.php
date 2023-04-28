@extends('layouts.admin')
@section('content')

<div class="row my-3">
  <div class="col-lg-8 mx-auto">
    <div class="card shadow">
      <div class="card-header bg-dark">
        <h3 class="text-light fw-bold">Add New Passport</h3>
      </div>
      <div class="card-body p-4">
        <form action="/post" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="my-2">
            <lable for="employee">Employee Full Name</lable>
            <input type="text" name="employee" id="employee" class="form-control @error('employee') is-invalid @enderror" placeholder="Employee Fullname" value="{{ old('employee') }}">
            @error('employee')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="my-2">
            <lable for="passport_num">Passport Number</lable>
            <input type="text" name="passport_num" id="passport_num" class="form-control @error('passport_num') is-invalid @enderror" placeholder="Employee Passport Number" value="{{ old('passport_num') }}">
            @error('passport_num')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="my-2">
            <lable for="passport_type">Passport Type</lable>
            <!-- <input type="text" name="passport_type" id="passport_type" class="form-control @error('passport_type') is-invalid @enderror" placeholder="Employee Passport Type" value="{{ old('passport_type') }}"> -->
            <select name="passport_type" id="passport_type" class="form-control" aria-lable=".form-select-lg example">
                <option value="select">Select Here</option>
                <option value="Official">Official</option>
                <option value="Diplomatic">Diplomatic</option>
                <option value="Ordinary">Ordinary</option>
            </select>
            @error('passport_type')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="my-2">
            <label for="issue_date">Issue Date</label>
            <input type="date" name="issue_date" id="issue_date" class="form-control @error('issue_date') is-invalid @enderror" placeholder="Passport Issue Date" value="{{ old('issue_date') }}">
            @error('issue_date')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="my-2">
            <label for="expiry_date">Expiry Date</label>
            <input type="date" name="expiry_date" id="expiry_date" class="form-control @error('expiry_date') is-invalid @enderror" placeholder="Passport Expiry Date" value="{{ old('expiry_date') }}">
            @error('issue_date')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="my-2">
            <lable for="file">Passport Photo</label>
            <input type="file" name="file" id="file" accept="image/*" class="form-control @error('file') is-invalid @enderror">
            @error('file')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="my-2">
            <label for="comment">Comment Section</label>
            <textarea name="comment" id="comment" rows="6" class="form-control @error('comment') is-invalid @enderror" placeholder="Anything wanna add on">{{ old('comment') }}</textarea>
            @error('comment')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="my-2">
            <input type="submit" value="Add Post" class="btn btn-dark">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
