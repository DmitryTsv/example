
<div class="container py-4">
    <h1>Заказ #<?php echo e($order->id); ?></h1>
    
    <div class="card mb-4">
        <div class="card-header">
            Информация о заказе
        </div>
        <div class="card-body">
            <p><strong>Клиент:</strong> <?php echo e($order->customer_name); ?></p>
            <p><strong>Дата создания:</strong> <?php echo e($order->created_at); ?></p>
            <p><strong>Статус:</strong> 
                <span class="badge <?php echo e($order->order_status === 'Новый' ? 'bg-primary' : 'bg-success'); ?>">
                    <?php echo e($order->order_status); ?>

                </span>
            </p>
            
            <?php if($order->order_status === 'Новый'): ?>
                <form action="<?php echo e(route('orders.complete', $order)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-success">Отметить как выполненный</button>
                </form>
            <?php endif; ?>
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
                    <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($product->name); ?></td>
                            <td><?php echo e($product->category->name); ?></td>
                            <td><?php echo e(number_format($product->price, 2)); ?> ₽</td>
                            <td><?php echo e($product->description ?? '-'); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2">Итого:</th>
                        <th><?php echo e(number_format($order->products->sum('price'), 2)); ?> ₽</th>

                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    
    <a href="<?php echo e(url()->previous()); ?>" class="btn btn-secondary mt-3">Назад</a>
</div><?php /**PATH /var/www/project/resources/views/viewOrderItem.blade.php ENDPATH**/ ?>