@extends('layouts.dashboard')

@section('title', 'Admin | Appartamenti')

@section('content')

    <a href="{{ route('flat.create') }}"><i class="fas fa-plus"></i> New flat</a>

    <table class="fade-in">
      <thead>
        <tr>
          <th scope="col"><i class="fas fa-hashtag"></i></th>
          <th scope="col"><i class="far fa-clock"></i></th>
          <th scope="col"><i class="fas fa-user"></i></th>
          <th scope="col" class="eye"><i class="far fa-eye"></i></th>
          <th scope="col"><i class="fas fa-home"></i></th>
        </tr>
      </thead>
      <tbody>
        @foreach($flats as $flat)
        <tr>
            <td scope="row">
              @if ($flat->visibility == 1)
              <i class="fas fa-circle visibility-on pulse"></i>
              @else
              <i class="fas fa-circle visibility-off pulse"></i>
              @endif
              {{ $flat->id }}
            </td>
            <td>{{ $flat->created_at }}</td>
            <td>{{ $flat->user->name }}</td>
            <td>{{ $flat->views }}</td>
            <td>{{ $flat->title }}</td>
            <td><a href="{{route('statistics',$flat->id)}}"><i class="fas fa-chart-line"></i></a></td>
            <td><a href="{{route('payment.view',$flat->id)}}"><i class="fas fa-ad"></i></a></td>
            <td><a href="{{route('flat.show',$flat->id)}}"><i class="fas fa-info-circle"></i></a></td>
            <td><a href="{{route('flat.edit',$flat->id)}}"><i class="fas fa-edit"></i></a></td>
            <td>
              <form action="{{route('flat.destroy', $flat->id) }}" method="post" class="form-delete">
              @csrf
              @method('DELETE')
                <button type="sumbit" class="btn"><a href=""><i class="fas fa-trash-alt"></i></a></button>
              </form>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>




@endsection