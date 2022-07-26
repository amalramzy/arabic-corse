<div class="btn-group">
    <button type="button" class="btn bg-white _r_btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="_dot _r_block-dot bg-primary"></span>
        <span class="_dot _r_block-dot bg-primary"></span>
        <span class="_dot _r_block-dot bg-primary"></span>
    </button>
    <div class="dropdown-menu" x-placement="bottom-start">
       
        <form id="delete-form{{$id}}" method="POST" action="{{route('videos.destroy',[$id])}}" >@csrf
            {{method_field('DELETE')}}
        </form> 
            <a class="dropdown-item" href="#" onclick="if(confirm('Do you want to delete?')){
                event.preventDefault();
                document.getElementById('delete-form{{$id}}').submit()
            }else{
                event.preventDefault();
            }
            ">Delete</a>
       
        <a class="dropdown-item" href="{{route('videos.edit',[$id])}}">Edit</a>
        {{-- <a class="dropdown-item " href="{{route('index.courses',[$id])}}">Courses</a> --}}

        {{-- <a class="dropdown-item " href="{{url('admin/admins/upload',[$id])}}">Upload Image</a> --}}
    </div>
</div>