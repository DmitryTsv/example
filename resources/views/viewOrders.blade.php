<div class="d-flex justify-content-center mb-3">
    <a href=".." class="btn btn-secondary mr-2">Вернуться</a>
    <a href="orders/create" class="btn btn-primary">Добавить заказ</a>
</div>

<div class="container">
    <h1 class="mb-4">Список заказов</h1>

    <!-- Количество найденных заказов -->
    <div class="mb-3 text-muted">
        Найдено заказов: {{ $orders->total() }}
    </div>

    <!-- Таблица заказов -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>№ заказа</th>
                    <th>Дата создания</th>
                    <th>Покупатель</th>
                    <th>Статус</th>
                    <th>Итоговая цена</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>
                        <span>
                            {{ $order->order_status }}
                        </span>
                    </td>
                    <td>{{ number_format($order->total, 2, '.', ' ') }} ₽</td>
                    <td>
                        <a href="orders/{{$order->id}}" class="btn btn-sm btn-info">Подробнее</a>
                        <a href="orders/delete/{{$order->id}}" class="btn btn-sm btn-danger" onclick="return confirm('Вы уверены?')">Удалить</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Пагинация -->

    <div style="width: 8%;" class="d-flex justify-content-center">
        {{ $orders->links() }}
    </div>
</div>