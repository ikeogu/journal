

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

    <div class="single-sidebar-widget p-30">
            <!-- Social Followers Info -->
            <div class="social-followers-info">
                    <!-- Facebook -->
                    <a href="/author_s" >For Authors</a>
                    <a href="/readers" >For Readers</a>
            </div>
    </div>

   
    <div class="single-sidebar-widget p-30">
            <!-- Section Title -->
            <div class="section-heading">
                    <h5>Newsletter</h5>
            </div>

            <div class="newsletter-form">
                    <p>Subscribe our newsletter to get notification about new Published Articles.</p>
                    <form action="#" method="get">
                            <input type="search" name="widget-search" placeholder="Enter your email">
                            <button type="submit" class="btn mag-btn w-100">Subscribe</button>
                    </form>
            </div>

    </div>
</div>
