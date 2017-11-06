@extends('layouts.main')
@section('title',' | Contact')
@section('content')
  <div class="row">
    <div class="col-md-12">
      <h2 class="title"> Contact Us</h2>
    <form>
      <fieldset class="form-group">
        <label for="subject">Email address</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email">
        <small class="text-muted">We'll never share your email with anyone else.</small>
      </fieldset>
      <fieldset class="form-group">
        <label for="subject">Subject address</label>
        <input type="subject" class="form-control" id="subject" placeholder="Enter Subject">

      </fieldset>

      <fieldset class="form-group">
        <label for="message">Massage </label>
        <textarea class="form-control" id="message" rows="3"></textarea>
      </fieldset>

      <button type="submit" class="btn btn-info">Submit</button>
    </form>

    </div>
    <hr>

  </div>

@endsection
