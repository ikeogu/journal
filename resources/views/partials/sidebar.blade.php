<div class="single-sidebar-widget p-30">
    <!-- Section Title -->
    <div class="section-heading">
        <ul>
            <li><a href="/categories">Categories</a>
                
            </li>
        <ul>
    </div>
    
    <div class="section-heading">
         <ul>
            <li>
            <a href="{{route('cat')}}">Submit article for publication</a>
                
            </li>
        <ul>
    </div>
    @auth
    <div class="section-heading">
        <ul>
            <li>
            <a href="{{route('cat')}}">Submit Corrected article for publication</a>
                
            </li>
        <ul>
    </div>
    @endauth
    <div class="section-heading">
        <ul>
            <li>
            <a href="{{route('publish.index')}}">published articles</a>
                
            </li>
        <ul>
    </div>
    
    <div class="section-heading">
       <ul>
            <li>
            <a href="{{route('editors.create')}}">apply as Editor</a>
                
            </li>
        <ul>
    </div>
    <div class="section-heading">
        <ul>
            <li>
            <a href="{{route('editors.create')}}">our Template</a>
                
            </li>
        <ul>    
    </div>
</div>