@extends('cms/layouts.app') 
@section('content')

<table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>time</th>
          <th>identity</th>
          <th>header</th>
          <th>content</th>
          <th>name</th>
          <th>mail</th>
        </tr>
      </thead>
      <tbody>
      	@foreach($contacts as $contact)
        <tr>
          <td>{{$contact->id}}</td>
          <td>{{$contact->created_at}}</td>
          <td>{{$contact->identity}}</td>
          <td>{{$contact->header}}</td>
          <td>{{$contact->content}}</td>
          <td>{{$contact->name}}</td>
          <td>{{$contact->mail}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>


@endsection