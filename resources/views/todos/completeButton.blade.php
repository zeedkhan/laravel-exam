            @if($todo->completed)
            <span class="fas fa-check text-green-500 px-2 cursor-pointer" onClick="event.preventDefault();document.getElementById('form-incomplete-{{$todo->id}}').submit()" />
            <form action="{{route('todo.incomplete', $todo->id)}}" method="post" id="{{'form-incomplete-'.$todo->id}}" style="display:none">
                @csrf
                @method('put')
            </form>
            @else
            <span onClick="event.preventDefault();document.getElementById('form-complete-{{$todo->id}}').submit()" ; class="fas fa-check text-gray-400 cursor-pointer px-2" />
            <form action="{{route('todo.complete', $todo->id)}}" method="post" id="{{'form-complete-'.$todo->id}}" style="display:none">
                @csrf
                @method('put')
            </form>
            @endif