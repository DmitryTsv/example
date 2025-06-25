<div class="container">
    <h1>Создание заказа</h1>
    
    <form method="POST" action="{{ route('orders.add') }}">
        @csrf
        
        <!-- Поле ФИО покупателя -->
        <div class="mb-3">
            <label for="customer_name" class="form-label">ФИО покупателя *</label>
            <input type="text" class="form-control @error('customer_name') is-invalid @enderror" 
                   id="customer_name" name="customer_name" value="{{ old('customer_name') }}" required>
            @error('customer_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <!-- Выбор статуса (необязательный) -->
        <div class="mb-3">
            <label for="order_status" class="form-label">Статус заказа</label>
            <select class="form-select @error('order_status') is-invalid @enderror" 
                    id="order_status" name="order_status">
                <option value="">-- Не указывать --</option>
                <option value="Новый" {{ old('order_status') == 'Новый' ? 'selected' : '' }}>Новый</option>
                <option value="Выполнен" {{ old('order_status') == 'Выполнен' ? 'selected' : '' }}>Выполнен</option>
            </select>
        </div>
        
        <!-- Выбор товаров -->
        <div class="mb-3">
            <label class="form-label">Товары *</label>
            @foreach($products as $product)
            <div @if($product->hasOrder) style="color:red"; @endif class="form-check">
                <input class="form-check-input" type="checkbox" 
                       name="product_ids[]" value="{{ $product->id }}" 
                       id="product_{{ $product->id }}" {{ is_array(old('product_ids')) && in_array($product->id, old('product_ids')) ? 'checked' : '' }}>
                <label class="form-check-label" for="product_{{ $product->id }}">
                    {{ $product->name }} ({{ number_format($product->price, 2) }} ₽)
                </label>
            </div>
            @endforeach
        </div>
        
        <!-- Комментарий -->
        <div class="mb-3">
            <label for="comment" class="form-label">Комментарий</label>
            <textarea class="form-control" id="comment" name="comment">{{ old('comment') }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Создать заказ</button>
        <a href="/orders" class="btn btn-secondary">Отмена</a>
    </form>
</div>