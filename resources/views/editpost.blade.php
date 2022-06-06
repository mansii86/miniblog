<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    @if (session()->has('status'))
    {{session('status')}}
  @endif

    <div class="form-group form-check">

        <title>Form</title>
      </div>
    <form method="post">
    @csrf
    @method('PUT')
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}" placeholder="Enter Title">
          {{-- <small id="" class="form-text text-muted">We'll never share your name with anyone else.</small> --}}
        </div>
        <div class="form-group">
          <label for="body">Body</label>
          <input type="text" class="form-control" name="body" value="{{$post->body}}" placeholder="Enter Body">
        </div>


        <div class="form-group">
        <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
      @if (session()->has('status'))
        {{session('status')}}
      @endif

</x-app-layout>
