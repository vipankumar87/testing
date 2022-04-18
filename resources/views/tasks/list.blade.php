<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }} <a class="float-right" href="{{route('task_create')}}">Add New</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
                        <h6>Tasks</h6>
                        <div id="tasklist">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            window.Echo.channel('task').listen('.message',(e)=>{
                $.tmpl( $('#task_list').html(), e ).appendTo( "#tasklist" );
            })
        })
    </script>
    <template id="task_list">
        <div class="card">
            <div class="card-header">
                ${task_name}
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>${description}</p>
                </blockquote>
            </div>
        </div>
    </template>
</x-app-layout>
