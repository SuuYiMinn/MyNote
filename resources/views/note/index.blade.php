@extends("layout.master")
@section("title", "Note List")

@section("body")

 @include("components.nav")
 
 <div class="p-4 sm:ml-64">
   <p class="text-2xl font-semibold opacity-70">Note List</p>
   <a href="/note/create" class="float-right mr-5 bg-blue-500 px-3 py-2 rounded-lg text-white mb-10">Add Note</a>
   

<div class="relative overflow-x-auto clear-both">
   <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
       <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
           <tr>
                <th scope="col" class="px-6 py-3">
                    NO
                </th>
               <th scope="col" class="px-6 py-3">
                   Title
               </th>
               <th scope="col" class="px-6 py-3">
                   Description
               </th>
               <th scope="col" class="px-6 py-3">
                   Status
               </th>
               <th scope="col" colspan="3" class=" px-6 py-3 text-center">
                   Action
               </th>
           </tr>
       </thead>
       <tbody>
@forelse ($notes as $note)
<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        {{ $loop->iteration }}
    </th>
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        {{ $note->title }}
    </th>
    <td class="px-6 py-4">
        {{ $note-> description}}
    </td>
    <td class="px-6 py-4">
       @if ($note->status==0)
           Done
       @elseif ($note->status==1)
           Not Done
       @endif
    </td>
    <td class="px-6 py-4">
        <a href="/note/{{ $note->id }}" class="text-blue-500 underline">View</a>
    </td>
    <td class="px-6 py-4">
        <a href="/note/{{ $note->id }}/edit" class="text-blue-500 underline">Edit</a>
    </td>
    <td class="px-6 py-4">
        <form action="/note/{{ $note->id }}" method="POST">
            @csrf
            @method("DELETE")
            <button type="submit" class="text-red-500 underline">Delete</button>
        </form>
        
    </td>
</tr>  
@empty
<p class="text-red-500">No Note data.</p>
@endforelse
   
       </tbody>
   </table>
</div>
<div class="mt-10">
    {{ $notes->links("pagination::tailwind") }}
    
</div>

 </div>
 

@endsection