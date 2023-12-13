@extends("layout.master")
@section("title", "Add Note")

@section("body")

 @include("components.nav")
 
 <div class="p-4 sm:ml-64">
   <p class="text-2xl font-semibold opacity-70 mb-5">Note Information</p>
   

<div class="leading-9">
  <p>Title : <span>{{ $notes->title }}</span></p>
  <p>Description : <span>{{ $notes->description }}</span></p>
  <p>Status : <span> @if ($notes->status==0) Done
      
  @elseif ($notes->status ==1)
Not Done      
  @endif
    </span></p>
</div>
<a href="/note" class="text-blue-500 underline">back</a>
    
 </div>
 

@endsection