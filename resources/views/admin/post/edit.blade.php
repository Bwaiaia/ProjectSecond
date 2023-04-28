@extends('layouts.admin')
@section('content')

<div class="row my-3">
  <div class="col-lg-8 mx-auto">
    <div class="card shadow">
      <div class="card-header bg-dark">
        <h3 class="text-light fw-bold">Passport Edition</h3>
      </div>
      <div class="card-body p-4">
        <form action="/post/{{ $post->id }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="my-2">
            <a class="btn btn-dark" href="{{ route('admin.post.index') }}">
              Back
            </a>
          </div>
          <hr>
          <div class="my-2">
            <label for="employee">Employee Name</lable>
            <input type="text" name="employee" id="employee" class="form-control" placeholder="Employee Name" value="{{ $post->employee }}" required>
          </div>

          <div class="my-2">
            <label for="passport_num">Passport Number</lable>
            <input type="text" name="passport_num" id="passport_num" class="form-control" placeholder="Employee Passport Number" value="{{ $post->passport_num }}" required>
          </div>

          <div class="my-2">
            <label for="passport_type">Passport Type</lable>
            <!-- <input type="text" name="employee" id="employee" class="form-control" placeholder="Employee Name" value="{{ $post->employee }}" required> -->
            <select name="passport_type" id="passport_type" class="form-control" aria-lable=".form-select-lg example" value="{{ $post->employee }}">
                <option value="select">Select Here</option>
                <option value="Official">Official</option>
                <option value="Diplomatic">Diplomatic</option>
                <option value="Ordinary">Ordinary</option>
            </select>
          </div>

          <div class="my-2">
            <label for="issue_date">Issue Date</label>
            <input type="text" name="issue_date" id="issue_date" class="form-control" placeholder="Passport Issue Date" value="{{ $post->issue_date }}" required>
          </div>

          <div class="my-2">
            <label for="expiry_date">Expiry Date</label>
            <input type="text" name="expiry_date" id="expiry_date" class="form-control" placeholder="Passport Expiry Date" value="{{ $post->expiry_date }}" required>
          </div>

          <div class="my-2">
            <label for="file">Passport Photo</label>
            <input type="file" name="file" id="file" accept="image/*" class="form-control">
          </div>

          <img src="{{ asset('storage/images/'.$post->image) }}" class="img-fluid img-thumbnail" width="150">

          <div class="my-2">
            <label for="comment">Comment Section</label>
            <textarea name="comment" id="comment" rows="6" class="form-control" placeholder="What's up bro ahah" required>{{ $post->comment }}</textarea>
          </div>
          <hr>
          <div class="my-2">
            <input type="submit" value="Update" class="btn btn-dark">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection