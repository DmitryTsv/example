<div class="d-flex justify-content-center">
        <a href="..">Вернуться</a>
        <a href="products/create">Добавить</a>
</div>

<div class="container">
    <h1 class="mb-4">Список товаров</h1>
    
    <!-- Количество найденных товаров -->
    <div class="mb-3 text-muted">
        Найдено товаров: {{ $products->total() }}
    </div>
    
    <!-- Таблица товаров -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Название</th>
                    <th>Категория</th>
                    <th>Цена</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td class="text-primary font-weight-bold">
                        {{ number_format($product->price, 2, '.', ' ') }} ₽
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="products/{{$product->id}}" class="btn btn-sm btn-outline-primary mr-2">
                                Подробнее
                            </a>
                            <a href="products/edit/{{$product->id}}" class="btn btn-sm btn-outline-secondary mr-2">
                                Изменить
                            </a>
                            <a href="products/delete/{{$product->id}}" class="btn btn-sm btn-outline-danger">
                                Удалить
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <!-- Пагинация -->
    <div style="width: 8%;" class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
</div>