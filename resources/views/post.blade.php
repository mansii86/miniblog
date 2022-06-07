 <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="form-group form-check">

        <title>Form</title>
      </div>
    <form method="post" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title"  name="title" placeholder="Enter Title">
          <br><br>

        </div>
        <div class="form-group">
          <label for="body">Body</label>
          <input type="text" class="form-control" name="body" name="body" placeholder="Enter Body">
          <br><br>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image"  name="image">
            <br><br>
        </div>

        <div class="form-group">
            <input type="button" class="btn btn-primary">Submit
        <br><br>

        </div>
      </form>
      @if (session()->has('status'))
        {{session('status')}}
      @endif

</x-app-layout>
