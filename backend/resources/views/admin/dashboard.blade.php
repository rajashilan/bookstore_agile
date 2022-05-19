@extends('layouts.master')

@section('title')

Dashboard | Admin

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Add Stock</h4>
        </div>
        <div class="container">
          <form>
            <div class="field" tabindex="1">
              <label for="authorname">
                <i class="far fa-user"></i>Author Name
              </label>
              <input name="authorname" type="text" placeholder="e.g. john doe" required>
            </div>

            <div class="field" tabindex="2">
              <label for="title">
                <i class="far fa-envelope"></i>Book Title
              </label>
              <input name="title" type="text" placeholder="The Fault in our Stars" required>
            </div>

            <div class="field" tabindex="3">
              <label for="text">
                <i class="far fa-envelope"></i>Publication Date
              </label>
              <input type="text" id="testDate" class="form-control" />
            </div>

            <div class="field" tabindex="4">
              <label for="message">
                <i class="far fa-edit"></i>Book Description
              </label>
              <textarea name="message" placeholder="The Fault In Our Stars is a fabilous book about a young teenage girl who has been ........" required></textarea>
            </div>

            
        
        <!-- This is not part of Pen -->
        <a class="me" href="https://codepen.io/uzcho_/pens/popular/?grid_type=list" target="_blank" style="color:#000"></a>

  
        
@endsection

@section('scripts')

@endsection