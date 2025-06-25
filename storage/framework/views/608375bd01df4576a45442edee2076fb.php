<div class="d-flex justify-content-center mb-3">
    <a href=".." class="btn btn-secondary mr-2">Вернуться</a>
    <a href="orders/create" class="btn btn-primary">Добавить заказ</a>
</div>

<div class="container">
    <h1 class="mb-4">Список заказов</h1>

    <!-- Количество найденных заказов -->
    <div class="mb-3 text-muted">
        Найдено заказов: <?php echo e($orders->total()); ?>

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
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($order->id); ?></td>
                    <td><?php echo e($order->created_at); ?></td>
                    <td><?php echo e($order->customer_name); ?></td>
                    <td>
                        <span>
                            <?php echo e($order->order_status); ?>

                        </span>
                    </td>
                    <td><?php echo e(number_format($order->total, 2, '.', ' ')); ?> ₽</td>
                    <td>
                        <a href="orders/<?php echo e($order->id); ?>" class="btn btn-sm btn-info">Подробнее</a>
                        <a href="orders/delete/<?php echo e($order->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Вы уверены?')">Удалить</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <!-- Пагинация -->

    <div style="width: 8%;" class="d-flex justify-content-center">
        <?php echo e($orders->links()); ?>

    </div>
</div><?php /**PATH /var/www/project/resources/views/viewOrders.blade.php ENDPATH**/ ?>