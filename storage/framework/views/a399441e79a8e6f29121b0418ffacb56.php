<div class="d-flex justify-content-center">
        <a href="..">Вернуться</a>
        <a href="products/create">Добавить</a>
</div>

<div class="container">
    <h1 class="mb-4">Список товаров</h1>
    
    <!-- Количество найденных товаров -->
    <div class="mb-3 text-muted">
        Найдено товаров: <?php echo e($products->total()); ?>

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
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($product->name); ?></td>
                    <td><?php echo e($product->category->name); ?></td>
                    <td class="text-primary font-weight-bold">
                        <?php echo e(number_format($product->price, 2, '.', ' ')); ?> ₽
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="products/<?php echo e($product->id); ?>" class="btn btn-sm btn-outline-primary mr-2">
                                Подробнее
                            </a>
                            <a href="products/edit/<?php echo e($product->id); ?>" class="btn btn-sm btn-outline-secondary mr-2">
                                Изменить
                            </a>
                            <a href="products/delete/<?php echo e($product->id); ?>" class="btn btn-sm btn-outline-danger">
                                Удалить
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    
    <!-- Пагинация -->
    <div style="width: 8%;" class="d-flex justify-content-center">
        <?php echo e($products->links()); ?>

    </div>
</div><?php /**PATH /var/www/project/resources/views/viewProducts.blade.php ENDPATH**/ ?>