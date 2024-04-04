@extends('layouts.app')
@section('content')

<h1>Création d'un post</h1>
@if($errors->any())
    @foreach($errors->all() as $errors)
        <p style="text-color: red">{{$errors}}</p>
    @endforeach

@endif
<form action="{{route('store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="tittle" placeholder="enter the tittle for your article">
    <textarea name="content" id="" cols="30" rows="10"> Enter a content</textarea>
   <input type="file" name="avatar" id="" value="a file">
     <!-- <label for="">red</label>
    <input type="checkbox" name="red" id=""  >
    <label for="">blue</label>
    <input type="checkbox" name="blue" id="" > -->
    <input type="submit" value="Valider">
</form>

@endsection