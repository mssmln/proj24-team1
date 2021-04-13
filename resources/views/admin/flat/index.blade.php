@extends('layouts.dashboard')

@section('title', 'Your flats')

@section('content') // qui tutti gli appartamenti
questa è la index

<div class="container">
    <a href="{{ route('flat.create') }}">create new flat</a>
</div>

<table class="table container">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">TITLE</th>
      <th scope="col">USER ID</th>
      <th scope="col">CREATED AT</th>
      <th scope="col">UPDATED AT</th>
    </tr>
  </thead>
  <tbody>
    @foreach($flats as $flat)
    <tr>
        <th scope="row">{{ $flat->id }}</th>
        <td>{{ $flat->title }}</td>
        <td>{{ $flat->user->name }}</td>
        <td>{{ $flat->created_at }}</td>
        <td>{{ $flat->updated_at }}</td>
        <td><a class="btn btn-info" href="{{route('flat.show',$flat->id)}}">view</a></td>
        <td><a class="btn btn-warning" href="{{route('flat.edit',$flat->id)}}">edit</a></td>
        <td><form action="{{route('flat.destroy', $flat->id) }}" method="post">
          @csrf
          @method('DELETE')
          <button type="sumbit" class="btn btn-danger">delete</button>
          </form>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>


@endsection