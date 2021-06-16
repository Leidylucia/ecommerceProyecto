<div class="aiz-category-menu bg-white rounded @if(Route::currentRouteName() == 'home') shadow-sm" @else shadow-lg" id="category-sidebar"  @endif>
    <div class="p-3 bg-soft-primary d-none d-lg-block rounded-top all-category position-relative text-left">
        <span class="fw-600 fs-16 mr-3">Categorias</span>
        <a href="{{ route('search') }}" class="text-reset">
            <span class="d-none d-lg-inline-block">Ver todas</span>
        </a>
    </div>
    <ul class="list-unstyled categories no-scrollbar py-2 mb-0 text-left">
        @foreach (\App\Category::get()->take(11) as $key => $category)
        <li class="category-nav-element" data-id="1">
            <a href="{{ route('products.category', $category->productos_categoriasid) }}" class="text-truncate text-reset py-2 px-3 d-block">
                <img
                    class="cat-image lazyload mr-2 opacity-60"
                    src="data:image/jpg;base64,{{ chunk_split(base64_encode($category->imagen)) }}"  
                    width="16"
                    alt="{{ $category->descripcion }}"
                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"                
                >
                <span class="cat-name">{{ $category->descripcion }}</span>
            </a>
          
           
        </li>
  
        @endforeach
            
   
    </ul>

</div>
