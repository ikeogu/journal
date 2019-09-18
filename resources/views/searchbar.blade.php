

<div class="post-sidebar-area  mt-30 mb-30 box-shadow">
    <!-- Sidebar Widget -->

    <!-- Top Search Area -->
    <div class="single-sidebar-widget p-30">
        <form  method="post" action="{{route('search')}}">
                @csrf
            <input type="text" name="q" id="search" placeholder="Search and hit enter..." class="form-control">
            <button class="btn mag-btn btn-md " style="border-radius:25%; ">Search</button>
        </form>

    </div>

</div>
