@props(['menuItems' => collect()])

<div class="offcanvas offcanvas-end" tabindex="-1" id="orderOffcanvas" aria-labelledby="orderOffcanvasLabel">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title fw-bold" id="orderOffcanvasLabel">Zamów pizzę</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Zamknij"></button>
    </div>

    <div class="offcanvas-body">
        <form action="{{ route('order.store') }}" method="POST" class="d-flex flex-column gap-3">
            @csrf

            <div>
                <label for="pizza_type" class="form-label fw-semibold">Rodzaj pizzy</label>
                <select id="pizza_type" name="menu_item_id" class="form-select" required>
                    <option value="" selected disabled>Wybierz pizzę</option>
                    @foreach ($menuItems as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="quantity" class="form-label fw-semibold">Ilość</label>
                <input
                    type="number"
                    id="quantity"
                    name="quantity"
                    class="form-control"
                    min="1"
                    value="1"
                    required
                >
            </div>

            <div>
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="np. jan@domena.pl" required>
            </div>

            <div>
                <label for="address" class="form-label fw-semibold">Adres</label>
                <input
                    type="text"
                    id="address"
                    name="address"
                    class="form-control"
                    placeholder="Ulica i numer, kod pocztowy, miasto"
                    required
                >
            </div>

            <button type="submit" class="btn btn-danger w-100 py-2 mt-2">Złóż zamówienie</button>
        </form>
    </div>
</div>
