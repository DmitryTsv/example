
<div class="container py-4">
    <h1>Заказ #{{ $order->id }}</h1>
    
    <div class="card mb-4">
        <div class="card-header">
            Информация о заказе
        </div>
        <div class="card-body">
            <p><strong>Клиент:</strong> {{ $order->customer_name }}</p>
            <p><strong>Дата создания:</strong> {{ $order->created_at }}</p>
            <p><strong>Статус:</strong> 
                <span class="badge {{ $order->order_status === 'Новый' ? 'bg-primary' : 'bg-success' }}">
                    {{ $order->order_status }}
                </span>
            </p>
            
            @if($order->order_status === 'Новый')
                <form action="{{ route('orders.complete', $order) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Отметить как выполненный</button>
                </form>
            @endif
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            Товары в заказе
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Категория</th>
                        <th>Цена</th>
                        <th>Описание</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ number_format($product->price, 2) }} ₽</td>
                            <td>{{ $product->description ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2">Итого:</th>
                        <th>{{ number_format($order->products->sum('price'), 2) }} ₽</th>

                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    
    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Назад</a>
</div>