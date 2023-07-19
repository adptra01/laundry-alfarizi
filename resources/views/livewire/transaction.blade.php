<div>
    @if ($categories)
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select wire:model="selectedCategoryId" class="form-select" name="category_id" id="category_id">
                <option value="" selected>Select one</option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    @endif

    @if ($services)
        <div class="mb-3">
            <label for="service_id" class="form-label">Service</label>
            <select wire:model="selectedServiceId" class="form-select" name="service_id" id="service_id">
                <option value="" selected>Select one</option>
                @foreach ($services as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    @endif

    <!-- Other form fields ... -->

    @if ($selectedServiceId && $servicePrice)
        <div class="row">
            <div class="col-md">
                <div class="mb-3">
                    <label for="price" class="form-label">Service Price</label>
                    <input type="text" class="form-control" name="price" id="price" aria-describedby="helpId"
                        placeholder="Service Price" value="{{ $servicePrice }}" readonly>
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>
            </div>
            <div class="col-md">
                <div class="mb-3">
                    <label for="weight" class="form-label">Weight</label>
                    <input wire:model="weight" type="number" class="form-control" name="weight" id="weight"
                        aria-describedby="helpId" placeholder="Weight">
                    <small id="helpId" class="form-text text-muted">Help text</small>
                </div>
            </div>
        </div>
    @endif

    @if ($selectedServiceId && $servicePrice)
        <div class="mb-3">
            <label for="totalTransaction" class="form-label">Total Transaction</label>
            <input type="text" class="form-control" name="totalTransaction" id="totalTransaction"
                aria-describedby="helpId" placeholder="Total Transaction" value="{{ $totalTransaction }}" readonly>
            <small id="helpId" class="form-text text-muted">Help text</small>
        </div>
    @endif

</div>
