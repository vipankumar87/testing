<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="col-md-4">
                        <form action="{{ route('task_create') }}}">
                            <div class="form-group">
                                <label for="task_name">Task Name</label>
                                <input type="text" class="form-control" id="task_name" name="task_name">
                            </div>
                            <div class="form-group">
                                <label for="task_desc">Description</label>
                                <textarea id="task_desc" id="task_desc" class="form-control"></textarea>
                            </div>
                            <button type="submit" id="btn_submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                    <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
                        <h6>Tasks</h6>
                        <div class="table-responsive">
                            <table class="table align-items-center">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                    <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created On</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            btn = document.getElementById('btn_submit');
            task_nameO = document.getElementById('task_name');
            task_descO = document.getElementById('task_desc');
            $('#btn_submit').on('click', (e)=>{
                e.preventDefault();
                const option = {
                    method: 'post',
                    url: "{{ route('send_message') }}",
                    data: {
                        task_name: task_nameO.value,
                        description: task_descO.value
                    }
                }
                axios(option)
            })
            window.Echo.channel('task').listen('.message',(e)=>{
                console.log(e)
            })
        })
    </script>
</x-app-layout>
