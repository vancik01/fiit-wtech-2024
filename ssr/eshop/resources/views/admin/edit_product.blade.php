@extends('layouts.app')

@section('title', config('urls.admin_edit_product.title'))

@section('content')
<main class="container mt-4 pt-0">
    <div class="d-flex flex-column p-md-5 justify-content-between ">
      <!-- Back navigation -->
      <div class="d-flex flex-column">
        <a href="/" class="text-black text-decoration-underline fw-bold">
          <i class="fas fa-arrow-left me-2"></i>Späť domov
        </a>
      </div>
      <form>
        <div class="d-flex flex-column col-12 col-md-5">
          <h1 class="h1 mt-3">{{ $product->title }}</h1>
          <input type="text" class="form-control mt-3 rounded-0" id="productName" placeholder="Nový názov produktu">
        </div>

        <!-- Product image upload -->
        <div class="d-flex flex-column col-md-5 col-12 mb-3 mt-5">
          <h4 class="h4">Obrázok produktu</h4>
          <div>
            <img src="{{ $product->featuredImage }}" alt="Product image" class="img-fluid" style="width: 150px; height: 150px;">
          </div>
          <div class="d-flex">
            <button class="btn btn-primary mt-2">Nahrať nový obrázok</button>
          </div>
        </div>

        <!-- galeria -->
        <div class="d-flex flex-column col-md-5">
          <h2 class="text-3xl">Galéria</h2>
          <div class="row row-cols-md-3 row-cols-2 g-2">
          @foreach ($product->galleryImages as $image)
              <div class="col">
                  <img src="{{ $image->imageURL }}" alt="gallery image" class="w-100" />
              </div>
          @endforeach
          </div>
          <div class="d-flex ">
            <button class="btn btn-primary mt-2">Upraviť obrázky</button>
          </div>
        </div>
      

        <div class="d-flex flex-wrap justify-content-between gap-2 pt-4">
          <div class="d-flex flex-column col-12 col-md-5">
            <!-- Short description -->
            <div class="mb-3 d-flex flex-column">
              <label for="shortDescription" class="form-label">Krátky opis</label>
              <textarea class="form-control rounded-0" id="shortDescription" rows="4"
                placeholder="Krátky opis produktu">{{ $product->shortDescription }}</textarea>
            </div>

            <!-- Detailed description -->
            <div class="mb-3 d-flex flex-column">
              <label for="detailedDescription" class="form-label">Dlhý opis</label>
              <textarea class="form-control rounded-0" id="detailedDescription" rows="7"
                placeholder="Dlhý opis produktu">{{ $product->longDescription }}</textarea>
            </div>
          </div>

          <div class="d-flex flex-column col-12 col-md-5 gap-3">
            <!-- Price, Category, Manufacturer, and Availability -->
            <div class="col-md-6 d-flex flex-column">
              <label for="price" class="form-label">Cena</label>
              <input type="text" class="form-control rounded-0" id="price" placeholder="Zadajte cenu v EUR" value="{{ $product->price }}">
            </div>
            <div class="col-md-6 d-flex flex-column">
              <label for="category" class="form-label rounded-0">Kategória produktu</label>
              <select class="form-select" id="category">
                <option selected>Vyberte z ponuky</option>
                <!-- Add category options here -->
              </select>
            </div>
            <div class="col-md-6 d-flex flex-column">
              <label for="manufacturer" class="form-label rounded-0">Výrobca</label>
              <select class="form-select" id="manufacturer">
                <option selected>Vyberte z ponuky</option>
                <!-- Add manufacturer options here -->
              </select>
            </div>
            <div class="col-md-6 d-flex flex-column">
              <label for="availability" class="form-label rounded-0">Dostupnosť</label>
              <select class="form-select" id="availability">
                <option selected>Vyberte dostupnosť</option>
                <!-- Add availability options here -->
              </select>
            </div>
          </div>
        </div>
        <!-- Publish button -->
        <div class="d-flex pt-3 gap-4 ">
          <div class="mt-0 d-flex flex-column">
            <button type="" class="btn btn-primary">Upraviť produkt</button>
          </div>
          <div class="mt-0 d-flex flex-column">
            <button type="" class="btn btn-danger">Zmazať produkt</button>
          </div>
        </div>
      </form>
    </div>
  </main>
@endsection