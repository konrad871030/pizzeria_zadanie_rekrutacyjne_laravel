@extends('layouts.app')

@section('title', 'Menu')

@section('content')
    <div class="bg-light min-vh-100 py-5">
        <div class="container">
            <div class="row align-items-center g-3 mb-4 mb-md-5">
                <div class="col-12 col-lg">
                    <h1 class="display-5 fw-bold mb-2">Nasze menu</h1>
                    <p class="text-secondary mb-0">Wybierz ulubioną pizzę i zamów online w kilka sekund.</p>
                </div>
                <div class="col-12 col-lg-auto">
                    <div class="d-flex flex-wrap gap-2 justify-content-lg-end">
                        <span class="badge rounded-pill text-bg-primary fs-6 px-3 py-2">
                            W kolejce: <span id="queue-count">0</span>
                        </span>
                        <span class="badge rounded-pill text-bg-success fs-6 px-3 py-2">
                            Czas oczekiwania: <span id="waiting-time">0</span> min
                        </span>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($menuItems as $item)
                    <div class="col-12 col-md-6 col-xl-4">
                        <article class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden menu-item">
                            <img
                                src="{{ asset('images/menu/' . $item->image) }}"
                                class="card-img-top"
                                alt="{{ $item->name }}"
                            >
                            <div class="card-body d-flex flex-column p-4">
                                <h2 class="h4 fw-semibold mb-2">{{ $item->name }}</h2>
                                <p class="text-secondary mb-4">{{ $item->description }}</p>

                                <div class="mt-auto d-flex align-items-center justify-content-between gap-3">
                                    <span class="fs-5 fw-bold text-danger">
                                        {{ number_format((float) $item->price, 2, ',', ' ') }} zł
                                    </span>
                                    <a href="#" class="btn btn-danger rounded-pill px-4">Zamów</a>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
