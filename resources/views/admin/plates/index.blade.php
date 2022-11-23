@extends('layouts.app')

@section('content')
  <section>
    <div class="container ">
      <div class="justify-content-between mb-2 flex-wrap row header__content">
        <div>
          <h1>
              Lista dei piatti
          </h1>
        </div>
        <div class="d-flex btn__header">
          <a href="{{ route('admin.home') }}"><button type="button" class="btn btn-warning btn-lg btn__header__item">Torna alla home</button></a>   
          <a href="{{ route('admin.plates.create') }}"><button type="button" class="btn btn-secondary btn-lg btn__header__item">Aggiungi un nuovo piatto</button></a>   
        </div>
      </div>   
    </div>    
    <div class="body_content py-5 d-flex flex-wrap justify-content-center">
      @foreach ($plates as $plate)
        <div class="card m-3 overflow-hidden" style="max-width: 320px; max-height: 400px; flex-grow:1;">
          <div class="card-body d-flex flex-column">
            <span class="h6">
              # {{ $plate->id }}
            </span>
            <span class="h6 text-capitalize">
              {{ $plate->restaurant->name }}
            </span>
            <div>
              <h3>
                {{ $plate->name }}
              </h3>
              <div class="h4">
                {{ $plate->price }} €
              </div>
            </div>
            <p class="overflow-auto">
              {{ $plate->description }}
            </p>
            <div class="d-flex p-2 flex-wrap align-items-end justify-content-between" style="flex-grow:1;">
              <a href="{{ route('admin.plates.show',$plate) }}" type="button" class="btn btn-secondary btn-sm">Mostra</a>
              <form action="{{ route('admin.plates.destroy',$plate) }}" method="POST" style="margin-bottom: 0;">
                @csrf
                @method('DELETE')
                <input type="submit" value="Cancella" class="btn btn-danger btn-sm">
              </form>
            </div>
          </div>
        </div>
      @endforeach
  </div>
  </section>
@endsection

<style>

  .btn__header {
    gap: 1rem;
  }
  

/*************************************/  
  @media all and (max-width:768px) {
  
    .btn__header__item {
      scale: 0.8;
    }
    .header__content {
      flex-direction: column;
      align-items: center;
    }
  }

/**************************************/  
  @media all and (max-width:576px) {
    .btn__header {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
  }
/**************************************/
</style>
